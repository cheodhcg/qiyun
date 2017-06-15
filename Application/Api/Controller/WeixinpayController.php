<?php

/**
 * Created by PhpStorm.
 * User: zcl
 * Date: 2017/6/12
 * Time: 14:13
 */
class WeixinpayController
{
    /**
     * 公众号支付 必须以get形式传递 out_trade_no 参数
     * 示例请看 /Application/Home/Controller/IndexController.class.php
     * 中的wexinpay_js方法
     */
    public function pay()
    {
        // 导入微信支付sdk
        Vendor('Weixinpay.Weixinpay');
        $wxpay = new \Weixinpay();
        // 获取jssdk需要用到的数据
        $data = $wxpay -> getParameters();
        // 将数据分配到前台页面
        $assign = array(
            'data' => json_encode($data)
        );
        $this -> assign($assign);
        $this -> display();
    }

    /**
     * notify_url接收页面
     */
    public function notify()
    {
        // ↓↓↓下面的file_put_contents是用来简单查看异步发过来的数据 测试完可以删除；↓↓↓
        // 获取xml
        $xml=file_get_contents('php://input', 'r');
        //转成php数组 禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $data= json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA));
        file_put_contents('./notify.text', $data);
        // ↑↑↑上面的file_put_contents是用来简单查看异步发过来的数据 测试完可以删除；↑↑↑

        // 导入微信支付sdk
        Vendor('Weixinpay.Weixinpay');
        $wxpay = new \Weixinpay();
        $result = $wxpay -> notify();
        if ($result) {
            // 验证成功 修改数据库的订单状态等 $result['out_trade_no']为订单id

        }
    }
}