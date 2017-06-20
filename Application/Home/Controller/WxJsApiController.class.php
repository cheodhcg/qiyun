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

        $info = $this->getGoodsInfo($id);

        $input = new \WxPayUnifiedOrder();
        $input -> SetBody("test1");
        $input -> SetAttach("test2");
        $input -> SetOut_trade_no(\WxPayConfig::MCHID . date("YmdHis"));
        $input -> SetTotal_fee("1");
        $input -> SetTime_start(date("YmdHis"));
        $input -> SetTime_expire(date("YmdHis", time() + 600));
        $input -> SetGoods_tag("test3");
        $input -> SetNotify_url("http://paysdk.weixin.qq.com/example/notify.php");
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
        $shop = M('shop');
        $info = $shop -> where("id={$id}") -> find();

        $info = $this->getGoodsInfo($id);

        $input = new \WxPayUnifiedOrder();
        $input -> SetBody("test1");
        $input -> SetAttach("test2");
        $input -> SetOut_trade_no(\WxPayConfig::MCHID . date("YmdHis"));
        $input -> SetTotal_fee("1");
        $input -> SetTime_start(date("YmdHis"));
        $input -> SetTime_expire(date("YmdHis", time() + 600));
        $input -> SetGoods_tag("test3");
        $input -> SetNotify_url("http://paysdk.weixin.qq.com/example/notify.php");
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