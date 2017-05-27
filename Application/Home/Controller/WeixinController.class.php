<?php
/**
 * Created by PhpStorm.
 * User: zcl
 * Date: 2017/5/23
 * Time: 17:06
 */

namespace Home\Controller;


class WeixinController extends HomeController
{
    public function weilogin(){
        $openid = I('get.openid');
        $Member = D ( "Member" );
        /*(2)判断是否已经获取到了openid，否第(3)步*/
        if ($openid) {
            /*(6)获取到了openid，判断member表是否存入用户的openid。存：非第一次注册登陆；没存：第一次注册登陆*/
            $weiuserinfo = M('member')->where (array('openid' => $openid))->find ();
            /*(7)有用户信息：非第一次注册登陆*/
            if ($weiuserinfo) {
                if ($Member->login ( $weiuserinfo ['uid'] )) { // 登录用户
                    //在登陆前的页面，设置cookie('api_redirect',U('Index.index'))信息
                    $urls = cookie ( 'api_redirect' );
                    //登录成功,跳转返回
                    redirect($urls);
                }else {
                    //登录异常，回到普通登陆页面
                    $this->error ( '登录超时！', U ( "/wap/user/login" ) );
                }
            } else {
                /*(8)没有存入用户openid：第一次注册登陆*/
                /*根据openid获取微信用户信息*/
                $weiData = getWeixinInfo($openid);
                if (!empty($weiData['nickname'])){
                    //设置用户名为用户微信昵称
                    $username=$weiData['nickname'];
                }else{
                    /*当用户未关注无法拉取用户信息时，为用户起名为当前时间戳。也可以提示用户关注公众号，否则就普通登陆*/
                    $username=NOW_TIME;
                }
                //进行重名检测，用户昵称若重名，之后数据表也无法添加用户信息
                $ischong = M('ucenter_member')->where(array('username'=>$username))->find();
                if($ischong>0){
                    //发现有重复用户名，命名为昵称+时间戳，避免重名
                    $username = $username.NOW_TIME;
                }
                /* 调用注册接口注册用户 */
                $User = new UserApi ();
                // 返回ucentermember数据表用户主键id；设置默认密码：123456
                $uid = $User->register ( $username, '123456' );
                if (0 < $uid) { // UC登录成功
                    /* 登录用户；D('Member')->login此操作实现向member表新增记录*/
                    if ($Member->login ( $uid, $_GET ['openid'] )) {
                        /*(9)登陆成功，回到设置的页面*/
                        redirect(cookie ( 'api_redirect' ));
                    }
                } else {
                    //ucenter_member表注册失败，跳转到普通登陆页
                    $this->error ( '登录超时！', U ( "/wap/user/login" ) );
                }
            }
        } else {
            /*(3)实现微信登陆获取openid*/
            if (! is_login ()) {
                $getopenId = I('get.getOpenId');
                $state = I('get.state');
                //此处组链接一定要细心，否则报redirect_uri错误信息。不要用手写的url
                $urls = C ( 'DOMAIN' ) . U ( "/Wap/User/weilogin" );
                /*(4)实现微信登陆第一步获取code，返回的链接参数含有$getopenId、$state信息*/
                if (!$getopenId){
                    $url = substr ( $urls, 0, - 5 );//该操作将去掉.html
                    // var_dump($url); //必要时检验
                    $urlforcode = createOauthUrlForCode($url);
                    redirect($urlforcode);
                }elseif($state){
                    /*(5)实现微信登陆第二步获取openid，返回openid；重新访问本函数，带上openid*/
                    $openid = getOpenId();
                    redirect ( $urls . addurl($callback, "openid",$openid));
                }
            }
        }
    }

}