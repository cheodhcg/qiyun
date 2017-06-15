<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * 系统配文件
 * 所有系统级别的配置
 */
return array(
    /* 模块相关配置 */
    'AUTOLOAD_NAMESPACE' => array('Addons' => ONETHINK_ADDON_PATH), //扩展模块列表
    'DEFAULT_MODULE'     => 'Home',
    'MODULE_DENY_LIST'   => array('Common','User','Admin','Install'),
    //'MODULE_ALLOW_LIST'  => array('Home','Admin'),

    /* 系统数据加密设置 */
    'DATA_AUTH_KEY' => 'v`#jBY^Wnd?=4N7%s[~8|iX!wu5_R>}<$:Gf06ac', //默认数据加密KEY

    /* 用户相关设置 */
    'USER_MAX_CACHE'     => 1000, //最大缓存用户数
    'USER_ADMINISTRATOR' => 1, //管理员用户ID

    /* URL配置 */
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'            => 3, //URL模式
    'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符

    /* 全局过滤配置 */
    'DEFAULT_FILTER' => '', //全局过滤函数

    /* 数据库配置 */
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.1.1', // 服务器地址
    'DB_NAME'   => 'qiyun', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'qy_', // 数据库表前缀

    /*服务器数据库*/
    /* 服务器数据库配置 */
//    'DB_TYPE'   => 'mysql', // 数据库类型
//    'DB_HOST'   => 'qiyun.mmqo.com', // 服务器地址
//    'DB_NAME'   => 'qiyun', // 数据库名
//    'DB_USER'   => 'qiyun', // 用户名
//    'DB_PWD'    => 'qiyun374037',  // 密码
//    'DB_PORT'   => '3306', // 端口
//    'DB_PREFIX' => 'qy_', // 数据库表前缀

    /* 文档模型配置 (文档模型核心配置，请勿更改) */
    'DOCUMENT_MODEL_TYPE' => array(2 => '主题', 1 => '目录', 3 => '段落'),

    /*微信*/
    'WEIXINPAY_CONFIG'       => array(
        'APPID'              => 'wxf973bd018fd47e2b', // 微信支付APPID
        'MCHID'              => '1480322582', // 微信支付MCHID 商户收款账号
        'KEY'                => 'EF8AFDACC98B270CA78150359C3474CB', // 微信支付KEY
        'APPSECRET'          => 'd0575f7ffc4f4829a4a4c524dcfaf521', // 公众帐号secert (公众号支付专用)
        'NOTIFY_URL'         => 'http://qiyun.mmqo.com//Api/Weixinpay/notify', // 接收支付状态的连接
    ),
);
