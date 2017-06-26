<?php
/**
 * Created by PhpStorm.
 * User: zcl
 * Date: 2017/6/15
 * Time: 14:37
 */

namespace Home\Controller;


use Think\Controller;

class WxJsApiController extends Controller
{
    public function _initialize()
    {
        vendor('Wxpay.WxPay#Api');
        vendor('Wxpay.WxPay#JsApiPay');

        //        //初始化日志
        //        $logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
        //        $log = Log::Init($logHandler, 15);



    }

    public function WxPay()
    {
        //①、获取用户openid
        $tools  = new \JsApiPay();
        $openId = $tools -> GetOpenid();
        //②、统一下单
        $id    = I('id');
        $model = M('shop');
        $goods = $model->where('id='.$id)->find();


        $info = $this->getGoodsInfo($id);

        $input = new \WxPayUnifiedOrder();
        //商品
        $input -> SetBody("test1");
        $input -> SetAttach("test2");
        $input -> SetOut_trade_no(\WxPayConfig::MCHID . date("YmdHis"));
        $input -> SetTotal_fee("1");
        $input -> SetTime_start(date("YmdHis"));
        $input -> SetTime_expire(date("YmdHis", time() + 600));
        $input -> SetGoods_tag("test3");
//        $input -> SetNotify_url("http://paysdk.weixin.qq.com/example/notify.php");
        $input -> SetNotify_url("http://qiyun.mmqo.com/example/notify.php");
        $input -> SetTrade_type("JSAPI");
        $input -> SetOpenid($openId);
        $order = \WxPayApi ::unifiedOrder($input);
//        echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
//        printf_info($order);
        $jsApiParameters = $tools -> GetJsApiParameters($order);
        //获取共享收货地址js函数参数
//        $editAddress = $tools->GetEditAddressParameters();

        $this -> assign('jsApiParameters', $jsApiParameters);

        $this -> display();
    }

    //购买会员套餐
    public function buyMember()
    {
        //①、获取用户openid
        $tools  = new \JsApiPay();
        $openId = $tools -> GetOpenid();

        //②、统一下单
        $id    = I('id');
        if (empty($id)) {
            $this -> error('请选择一个商品');
        }

        $info = $this->getGoodsInfo($id);

        $input = new \WxPayUnifiedOrder();
        $input -> SetBody($info['title']);
        $input -> SetAttach($info['id']);//设置附加数据，在查询API和支付通知中原样返回，该字段主要用于商户携带订单的自定义数据
        $input -> SetOut_trade_no(\WxPayConfig::MCHID . date("YmdHis"));
        $input -> SetTotal_fee("1");
        $input -> SetTime_start(date("YmdHis"));
        $input -> SetTime_expire(date("YmdHis", time() + 600));
        $input -> SetGoods_tag("test3");//设置商品标记，代金券或立减优惠功能的参数，说明详见代金券或立减优惠
        $input -> SetNotify_url("http://qiyun.mmqo.com/index.php/Home/WxJsApi/wx_notify");
//        $input -> SetNotify_url("http://qiyun.mmqo.com/ThinkPHP/Library/Vendor/notify.php");
        $input -> SetTrade_type("JSAPI");
        $input -> SetOpenid($openId);
        $order = \WxPayApi ::unifiedOrder($input);
//        echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
//        printf_info($order);
        $jsApiParameters = $tools -> GetJsApiParameters($order);
        //获取共享收货地址js函数参数
//        $editAddress = $tools->GetEditAddressParameters();

        $this -> assign('jsApiParameters', $jsApiParameters);

        $this -> assign('info', $info);
        $this -> assign('_title', '商品详情');
        $this -> display();
    }
    //微信APP支付后台响应接口
    function wx_notify(){
        vendor('Wxpay.WxPay#Notify');
        vendor('Wxpay.WxPay#NotifyCallBack');
        $raw_xml = $GLOBALS['HTTP_RAW_POST_DATA'];//获取XML信息
//        $raw_xml = file_get_contents("php://input");
        $notify = new \WxPayNotifyCallBack();
        $notify->Handle(false);
        $res = $notify->GetValues();
        if($res['return_code'] ==="SUCCESS" && $res['return_msg'] ==="OK"){
            libxml_disable_entity_loader(true);
            $ret = json_decode(json_encode(simplexml_load_string($raw_xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
            \Think\Log::write('微信APP支付成功订单号'.$ret['out_trade_no'], \Think\Log::DEBUG);
            //在此处处理业务逻辑部分
            $path = "./log/".date('Ymd',time());
            if (!is_dir($path)) {
                //检查是否为目录，如果没有目录则创建一个目录
                mkdir($path);
            }
            $path = $path."/Wxpay_notify.log";
            log_result($path,"【Notice of payment received】:\n".json_encode($ret)."\n");
            if ($ret['result_code']){
                $goodsId = $ret['attach'];//商品ID
                write_inv($goodsId);//购买写入邀请码
            }else{

            }

        }


    }

    function getGoodsInfo($id){
        //获取商品信息

        $shop  = M('shop');
        $info  = $shop -> where("id={$id}") -> find();
        return $info;
    }
    //设置订单信息
    public function setOrderInfo(){

    }

}