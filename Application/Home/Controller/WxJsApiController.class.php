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
    public function WxPay(){
        vendor('Wxpay.WxPay#Api');
        vendor('Wxpay.WxPay#JsApiPay');

//        //初始化日志
//        $logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
//        $log = Log::Init($logHandler, 15);

        //①、获取用户openid
        $tools = new \JsApiPay();
        $openId = $tools->GetOpenid();

        //②、统一下单
        $input = new \WxPayUnifiedOrder();
        $input->SetBody("test");
        $input->SetAttach("test");
        $input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
        $input->SetTotal_fee("1");
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url("http://paysdk.weixin.qq.com/example/notify.php");
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $order = WxPayApi::unifiedOrder($input);
//        echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
//        printf_info($order);
        $jsApiParameters = $tools->GetJsApiParameters($order);

        //获取共享收货地址js函数参数
//        $editAddress = $tools->GetEditAddressParameters();

        $this->assign('jsApiParameters',$jsApiParameters);
        $this->display();
    }

}