<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use Think\Controller;

/**
 * 前台公共控制器
 * 为防止多分组Controller名称冲突，公共Controller名称统一使用分组名称
 */
class HomeController extends Controller {
//	public $appid = 'wxf973bd018fd47e2b';
//	public $AppSecret = 'd0575f7ffc4f4829a4a4c524dcfaf521';
	public $appid = 'wxe58e0c041bed2598';
	public $AppSecret = '263a8ddb41435b76bd281d8117cd5efc';
    public $hosturl = "http://ciubc3.natappfree.cc"; //配置域名
    public $redirect_uri =  "http://ciubc3.natappfree.cc"; //微信授权回调域名
    public $key = "MDAwMDAwMDAwML6IgpuLf3-YwLiMrIbOfpaKurSpe4OicA";//全局key。加密字符串：adadqwe5123_ad1!



	/* 空操作，用于输出404页面 */
	public function _empty(){
		$this->redirect('Index/index');
	}

    protected function _initialize(){
        /* 读取站点配置 */
        $config = api('Config/lists');
        C($config); //添加配置
        //获取分类
        $cate_list = S('cate_list');
        if(empty($cate_list)){
	        $list = M('category')->where("pid=1")->field('id,title')->select();
	        if(!empty($list)){
	        	S('cate_list',$list);
	        }
	    }
	    $this->cate_list = $cate_list;


//	    weixin_login($this->appid,$this->redirect_uri);
        //微信登陆获取用户信息
        //存取用户的信息，当用户访问
        if(empty($_COOKIE['qiyun_user'])){//如果为空则是第一次访问，获取用户信息
            $appid = $this->appid;
            $type = I('type');
            $type = empty($type)? 1 : $type;
            switch ($type){
                case 1:
                    $url2 = U('Home/index/index');
                    break;
                case 2:
                    $url2 = U('Home/Lecture/index');
                    break;
                case 3:
                    $url2 = U('Home/Shop/index');
                    break;
                case 4:
                    $url2 = U('Home/Contact/index');
                    break;
                case 5:
                    $url2 = U('Home/User/index');
                    break;
            }
            $url2 = substr($url2,0,-5);
            $redirect_uri = $this->redirect_uri.$url2."/getcode/1/type/".$type.".html";
            $getCode = I('get.getcode');
            if($getCode){
                //通过获取到了code获取access_token
                $appid = $this->appid;
                $secret = $this->AppSecret;
                $code = I('get.code');

                //第一步:取全局access_token
                $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$secret";
                $token = getJson($url);

                //第二步:取得openid
                $oauth2Url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
                $oauth2 = getJson($oauth2Url);

                //第三步:根据全局access_token和openid查询用户信息
                $access_token = $token["access_token"];
                $openid = $oauth2['openid'];
                $get_user_info_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid&lang=zh_CN";
                //获取到的用户信息
                $userinfo = getJson($get_user_info_url);

                $userM = M('user');
                $wxUserM = M('wx_userinfo');
                $where['OpenID'] = $userinfo[openid];
                $res = $userM->where($where)->field('id')->select();
                //如果为空，用户表还没有当前微信用户的信息。新建当前用户的个人信息
                if (empty($res)){
                    $data['OpenID'] = $userinfo[openid];
                    $data['nickname'] = $userinfo[nickname];
                    $data['face'] = $userinfo[headimgurl];
                    $data['addtime'] = time();
                    $uid = $userM->add($data);
                    //将微信个人信息也保存
                    $userinfo['uid'] = $uid;
                    $res2 = $wxUserM->add($userinfo);
                    //有效期一个月,设置一个cookie
                    $validity = 3600*24*30;
                    cookie('user',$uid,array('expire'=>$validity,'prefix'=>'qiyun_'));
                    $_SESSION['user'] = $uid;
//                    session('user',$uid);

                }
                //不为空记录cookie
                else{
                    $validity = 3600*24*30;
                    cookie('user',$res[0][id],array('expire'=>$validity,'prefix'=>'qiyun_'));
//                    session('user',$res[0][id]);
                    $_SESSION['user'] = $res[0][id];
                }

            }else{
                $redirect_uri = urlencode ($redirect_uri);
                $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appid}&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_base&state=1#wechat_redirect";

                header("Location:".$url);
            }

        }else{
            session('user',cookie('qiyun_user'));

        }



        if(!C('WEB_SITE_CLOSE')){
            $this->error('站点已经关闭，请稍后访问~');
        }
    }
    public function get_access_token(){
        $appid = "你的AppId";
        $secret = "你的AppSecret";
        $code = I('code');

//第一步:取全局access_token
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$secret";
        $token = getJson($url);

//第二步:取得openid
        $oauth2Url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
        $oauth2 = getJson($oauth2Url);

//第三步:根据全局access_token和openid查询用户信息
        $access_token = $token["access_token"];
        $openid = $oauth2['openid'];
        $get_user_info_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid&lang=zh_CN";
        $userinfo = getJson($get_user_info_url);

//打印用户信息
        print_r($userinfo);
    }

	/* 用户登录检测 */
	protected function login(){
		/* 用户登录检测 */
		is_login() || $this->error('您还没有登录，请先登录！', U('User/login'));
	}


}
