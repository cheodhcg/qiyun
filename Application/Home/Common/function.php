<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * 前台公共库文件
 * 主要定义前台公共函数库
 */

/**
 * 检测验证码
 * @param  integer $id 验证码ID
 * @return boolean     检测结果
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function check_verify($code, $id = 1){
	$verify = new \Think\Verify();
	return $verify->check($code, $id);
}

/**
 * 获取列表总行数
 * @param  string  $category 分类ID
 * @param  integer $status   数据状态
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function get_list_count($category, $status = 1){
    static $count;
    if(!isset($count[$category])){
        $count[$category] = D('Document')->listCount($category, $status);
    }
    return $count[$category];
}

/**
 * 获取段落总数
 * @param  string $id 文档ID
 * @return integer    段落总数
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function get_part_count($id){
    static $count;
    if(!isset($count[$id])){
        $count[$id] = D('Document')->partCount($id);
    }
    return $count[$id];
}

/**
 * 获取导航URL
 * @param  string $url 导航URL
 * @return string      解析或的url
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function get_nav_url($url){
    switch ($url) {
        case 'http://' === substr($url, 0, 7):
        case '#' === substr($url, 0, 1):
            break;        
        default:
            $url = U($url);
            break;
    }
    return $url;
}


/**
* 获取用户信息
*/
function get_user_info($uid){
    $user = M('user')->where("uid={$uid}")->find();
    return $user;
}


/**
* 微信请求
*/
function weixin_login($appid,$redirect_uri){
    //获取当前用户的基本信息查询数据库
    $redirect_uri = urlencode ($redirect_uri);
    $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appid}&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_base&state=1#wechat_redirect";
    header("Location:".$url);

   /* $user = session('user_auth');

    if (!$user['uid']) {
        //登录后返回现在保存的页面

        $returnurl = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];;
        session('returnurl', $returnurl);
        $uri = $redirect_uri . '/returnurl/' . $returnurl;
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appid}&redirect_uri={$uri}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
        header('Location:' . $url);exit;
    }*/
}
function getJson($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
}

/**
* 根据时间戳计算多少小时前
*/
function timediff($time){
    $timediff = time() - $time;
    //获取天数
    $days = intval($timediff/86400);
    //获取小时
    $remain = $timediff%86400;
    $hours = intval($remain/3600);
    //获取分钟
    $remain = $remain%3600;
    $mins = intval($remain/60);
    //获取秒
    $secs = $remain%60;
    if($days < 1){
        if($hours < 1){
            if($mins){
                $str = $mins.'分钟前';
            }else{
                $str = $secs.'秒前';
            }
        }else{
            $str = $hours.'小时前';
        }
    }else{
        $str = $days.'天前';
    }
    return $str;
}