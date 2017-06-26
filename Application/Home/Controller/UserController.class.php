<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use User\Api\UserApi;

/**
 * 用户控制器
 * 包括用户中心，用户登录及注册
 */
class UserController extends HomeController {

	
	/* 用户中心首页 */
	public function index(){
//		$info = get_user_info($session['uid']);
        $model = M('user');
        $where['id'] = $_COOKIE['qy_user'];
        $rs = $model->where($where)->field(true)->select();
		$this->assign('info',$rs[0]);
		$this->display();
	}

	//我的提问
	public function myQuestion(){
		$p = I('p');
		$Question = M('Question');
		//获取推荐的问答培训
        $field = "id,title,content,addtime";
        $uid = $_COOKIE['qy_user'];
	    $count = $Question->where('uid='.$uid)->count();// 查询满足要求的总记录数 $map表示查询条件
	    $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
	    //$show = $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $list = $Question->where('uid='.$uid)->order('id')
	    		->limit($Page->firstRow.','.$Page->listRows)
	    		->field($field)
	    		->order("id DESC")
	    		->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条
	   	if(is_array($list)){
	   		$question_answer = M('question_answer');
		    foreach ($list as $key => $value) {
		    	$list[$key]['addtime'] = date('Y-m-d H:i',$value['addtime']);
		    	$info = $question_answer->where("pid={$value['id']}")->field("COUNT(*) AS answer_num, SUM('num') AS number")->find();
		    	$list[$key]['answer_num'] = $info['answer_num'];
		    	$list[$key]['number'] = $info['number'] ? $info['number'] : 0;
		    }
		}
		if($p > 1){
            if($list){
                $this->success($list);exit;
            }else{
                $this->error('没有更多信息');exit;
            }
        }
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',count($list) == 10 ? "1" : "0");
		$this->display();
	}
	//删除我的提问
    public function delMyQuestion(){
        $p = I('id');
        $Question = M('Question');

    }

	//我的回答
	public function myAnswer(){
		$p = I('p');
		//$question = M('question');
		$question_answer = M('question_answer');
		$where['uid'] = $_COOKIE['qy_user'];
	    $count = $question_answer->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
	    $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
	    $show = $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $where1['qy_question_answer.uid'] = $_COOKIE['qy_user'];
	    $list = $question_answer->where($where1)
	    		->join("join qy_question ON  qy_question_answer.pid = qy_question.id")
	    		->field("qy_question.id,qy_question.title,qy_question.content,qy_question_answer.addtime,qy_question_answer.num")
	    		->limit($Page->firstRow.','.$Page->listRows)
	    		->order('id DESC')
	    		->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条
	    if($list){
	    	foreach ($list as $key => $value) {
	    		$list[$key]['addtime'] = date('Y-m-d H:i',$value['addtime']);
	    	}
	    }		
	    if($p > 1){
            if($list){
                $this->success($list);exit;
            }else{
                $this->error('没有更多信息');exit;
            }
        }
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',count($list) == 10 ? "1" : "0");
		$this->display();
	}

	//我听过的
	public function myHeard(){
		$question_heard = M('question_heard'); //记录表，用户听讲座和问答
		$where['uid'] = session('uid');
	    $count = $question_heard->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
	    $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
	    $show = $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $where1['qy_question_heard.uid'] = session('uid');
	    $list = $question_heard->where($where1)
	    		->join("join qy_question ON qy_question.id = qy_question_heard.pid")
	    		->field("qy_question.id,qy_question.content,qy_question_heard.addtime")
	    		->limit($Page->firstRow.','.$Page->listRows)
	    		->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条
	    if($list){
	    	foreach ($list as $key => $value) {
	    		$list[$key]['addtime'] = date('Y-m-d H:i',$value['addtime']);
	    	}
	    }
	    if($p > 1){
            if($list){
                $this->success($list);exit;
            }else{
                $this->error('没有更多信息');exit;
            }
        }
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',count($list) == 10 ? "1" : "0");
		$this->display();
	}


	//我的讲座
	public function myLecture(){
		$p = I('p');
		$Lecture = M('Lecture');
		$lecture_partake = M('lecture_partake');
		$where['uid'] = $_COOKIE['qy_user'];
		$newlist = $lecture_partake->where($where)->field('pid')->select();
		if($newlist){
			$pid = array_column($newlist,'pid');
			$map['id'] = ['in',$pid];
		}
		$map['uid'] = $_COOKIE['qy_user'];
		$map['_logic'] = "OR";
		$count = $Lecture->where($map)->count();// 查询满足要求的总记录数 $map表示查询条件
	    $Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
	    $show = $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $list = $Lecture->where($map)
	    		->field("*")
	    		->limit($Page->firstRow.','.$Page->listRows)
	    		->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条
	    if($list){
	    	foreach ($list as $key => $value) {
	    		if($value['uid'] == session('uid')){
	    			$is_my = 1;
	    		}else{
	    			$is_my = 0;
	    		}
	    		$list[$key]['is_my'] = $is_my;
	    		$list[$key]['addtime'] = date('Y-m-d H:i',$value['addtime']);
	    	}
	    }
	    if($p > 1){
			if($list){
				$this->success($list);exit;
			}else{
				$this->error('没有更多的信息');exit;
			}
		}
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',count($list) == 5 ? "1" : "0");
		$this->display();
	}

	//我的账户
	public function myMoney(){
		$user = M('user');
		$user_money_log = M('user_money_log');
		$where['uid'] = session('uid');
		$info = $user->where($where)->field('total_money,user_money')->find(); //获取用户当前的总收入和剩余金额
		$info['total_money'] = $info['total_money'] ? $info['total_money'] : "0.00";
		$info['user_money'] = $info['user_money'] ? $info['user_money'] : "0.00";
		//获取用户收入情况
		$list = $user_money_log->where($where)->field('type,money,addtime')->select();
		foreach ($list as $key => $value) {
			$list[$key]['type'] = (($value['type']  == 0 ? "提问分成" : "回答成分") == 1 ? "回答分成" : "讲座分成") == 2 ? "讲座分成" : "打赏";
		}
		//获取今日的收入
		$stime = strtotime(date('Y-m-d',time()).' 00:00:00');
		$etime = strtotime(date('Y-m-d',time()).' 23:59:59');
		$where['addtime'] = ['between',"$stime,$etime"];
		$total_money = $user_money_log->where($where)->sum('money');

		$this->assign('total_money',$total_money?$total_money:"0.00");
		$this->assign('list',$list);
		$this->assign('info',$info);
		$this->display();
	}


	//用户提现
	public function cash(){
		$user = M('user');
		$where['uid'] = session('uid');
		$user_money = $user->where($where)->getField('user_money'); //获取用户当前剩余金额
		if(IS_POST){
			$this->error('功能完善中...等待微信公众号');exit;
			$tx_moeny = $_POST['tx_moeny'];
			if($tx_moeny > $user_money){
				$this->error('提现金额不足');exit;
			}
			$data['money'] = $tx_moeny;
			$data['addtime'] = time();
			$data['uid'] = $uid;
			$re = M('user_cash')->add($data);
			if($re){
				$this->success('提现成功,等待返回您的钱包');exit;
			}else{
				$this->error('提现失败,请再次体现');exit;
			}
		}
		$this->assign('user_money',$user_money ? $user_money : '0.00');
		$this->display();
	}

	//我的认证
	public function myAuthentication(){
	    $uid = $_COOKIE['qy_user'];
		$info = get_user_info($uid);
		$level = $info['level'];
		$this->assign('level',$level);
		$this->display();
	}

	//申请成为专家会员
	public function apply(){
		if(IS_POST){
			$uid = $_COOKIE['qy_user'];
			$_POST['status'] = 1;
			$where['id'] = $uid;
            $data['uid'] = $uid;
            $data['create_time'] = time();
			$re = M('user')->where($where)->save($_POST);
			$re = M('apply_expert_info')->add($data);
			if($re !==false){
				$this->success('申请成功,等待后台处理');
			}else{
				$this->error('申请失败,请重新申请');
			}
		}
		$list = M('category')->where("pid=42")->field('id,title')->select();
		$this->assign('list',$list);
		$this->assign('cate_list',$this->cate_list);//分类列表 
		$this->display();
	}

	//我的通知
	public function mySms(){
		$sms = M('sms_log');
		$map['uid'] = $_COOKIE['qy_user'];
		$count = $sms->where($map)->count();// 查询满足要求的总记录数 $map表示查询条件
	    $Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
	    $show = $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $list = $sms->where($map)
	    		->field("*")
	    		->limit($Page->firstRow.','.$Page->listRows)
	    		->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条
	    $this->assign('list',$list);// 赋值数据集
		$this->display();
	}


	//我的信息
	public function myinfo(){
		$map['id'] = $_COOKIE['qy_user'];
		if(IS_POST){
		    $_POST['is_zs'] = isset($_POST['is_zs']) ? $_POST['is_zs']:0;
			$re = M('user')->where($map)->save($_POST);
			if($re !== false){
				$this->success('更新成功');
			}else{
				$this->error('更新失败');
			}
		}
		$info = M('user')->where($map)->find();
		$this->assign('info',$info);//分类列表 
		$this->display();
	}

	//企业介绍
	public function about(){
		$about = C('SYSTEM_ABOUT');
		$this->assign('about',$about);
		$this->display();
	}

	//系统动态
	public function news(){
		$this->error('完善中....敬请期待');
	}
	
	/* 登录页面 */
//	public function login($username = '', $password = '', $verify = ''){
//		$code = I('get.code');
//		empty($code) && $this->redirect('/');
//		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->appid}&secret={$this->secret}&code={$code}&grant_type=authorization_code";
//		$data = file_get_contents($url);
//		$data = (array) json_decode($data);
//		logs('data1=>' . serialize($data));
//		if ($data['errcode']) {
//			$this->error('正在获取授权信息!', '/');
//		}
//		//获取微信的用户信息
//		$access_token = $data['access_token'];
//		$openid = $data['openid'];
//		$url2 = "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$openid}";
//		//logs($url2);
//		$user_data = file_get_contents($url2);
//		$user_data = (array) json_decode($user_data);
//		//logs('data2=>' . serialize($user_data));
//		if ($user_data['errcode']) {
//			$this->error('正在获取授权信息!!', '/');
//		}
//		//验证是否有该用户
//		$user_data2 = M('user')->where("OpenID = {$user_data['openid']}")->field('uid,username')->find();
//		//如果有该用户,则更新用户信息
//		if ($user_data2['uid']) {
//			//更新用户信息
//			if ($user_data['nickname']) {
//				$data['nickname'] = jsonName($user_data['nickname']);
//			}
//			if ($user_data2['headimgurl']) {
//				$data['headimgurl'] = $user_data['headimgurl'];
//			}
//			M('user')->where("uid={$user_data2['uid']}")->save($data);
//			//session保存数据
//			session("uid", $user_data2["uid"]);
//			if (empty($returnurl)) {
//				$this->redirect('/');
//			} else {
//				header('Location: ' . $returnurl);
//			}
//			exit;
//		}
//		/* 调用UC登录接口登录 */
//		$username = $user_data['openid'];
//		$password = $user_data['openid'];
//		$user = new UserApi;
//		$uid = $user->login($username, $password);
//		if (0 < $uid) {
//			//UC登录成功
//			$Member = D('Member');
//			if ($Member->login($uid)) {
//				//登录用户
//				$map['uid'] = $uid;
//				session("uid", $uid);
//				$data['nickname'] = jsonName($user_data['nickname']);
//				$data['face'] = $user_data['headimgurl'];
//				M('user')->where("uid={$uid}")->save($data);
//				if (empty($returnurl)) {
//					$this->redirect('/');
//				} else {
//					header('Location: ' . $returnurl);
//				}
//				exit;
//			} else {
//				$this->error($Member->getError() . $uid);
//			}
//		} else {
//			if ($uid == -1) {
//				/* 调用注册接口注册用户 */
//				$User = new UserApi;
//				$uid = $User->register($username, $password, $email = '');
//				if (0 < $uid) {
//					// 注册用户扩展信息
//					$data['nickname'] = $user_data['nickname'];
//					$data['face'] = $user_data['headimgurl'];
//					$data['addtime'] = time();
//					$data['uid'] = $uid;
//					M('user')->add($data);
//					//登录SESSION
//					session("uid", $uid);
//					if (empty($returnurl)) {
//						$this->redirect('/');
//					} else {
//						header('Location: ' . $returnurl);
//					}
//				} else {
//					//注册失败，显示错误信息
//					$this->error('注册失败!');
//				}
//			} else {
//				$this->error('登录失败!!');
//			}
//		}
//	}
    public function login()
    {
        echo I('code');
    }

    /* 退出登录 */
	public function logout(){
		if(is_login()){
			D('Member')->logout();
			$this->success('退出成功！', U('User/login'));
		} else {
			$this->redirect('User/login');
		}
	}

	/* 验证码，用于登录和注册 */
	public function verify(){
		$verify = new \Think\Verify();
		$verify->entry(1);
	}

	/**
	 * 获取用户注册错误信息
	 * @param  integer $code 错误编码
	 * @return string        错误信息
	 */
	private function showRegError($code = 0){
		switch ($code) {
			case -1:  $error = '用户名长度必须在16个字符以内！'; break;
			case -2:  $error = '用户名被禁止注册！'; break;
			case -3:  $error = '用户名被占用！'; break;
			case -4:  $error = '密码长度必须在6-30个字符之间！'; break;
			case -5:  $error = '邮箱格式不正确！'; break;
			case -6:  $error = '邮箱长度必须在1-32个字符之间！'; break;
			case -7:  $error = '邮箱被禁止注册！'; break;
			case -8:  $error = '邮箱被占用！'; break;
			case -9:  $error = '手机格式不正确！'; break;
			case -10: $error = '手机被禁止注册！'; break;
			case -11: $error = '手机号被占用！'; break;
			default:  $error = '未知错误';
		}
		return $error;
	}


    /**
     * 修改密码提交
     * @author huajie <banhuajie@163.com>
     */
    public function profile(){
		if ( !is_login() ) {
			$this->error( '您还没有登陆',U('User/login') );
		}
        if ( IS_POST ) {
            //获取参数
            $uid        =   is_login();
            $password   =   I('post.old');
            $repassword = I('post.repassword');
            $data['password'] = I('post.password');
            empty($password) && $this->error('请输入原密码');
            empty($data['password']) && $this->error('请输入新密码');
            empty($repassword) && $this->error('请输入确认密码');

            if($data['password'] !== $repassword){
                $this->error('您输入的新密码与确认密码不一致');
            }

            $Api = new UserApi();
            $res = $Api->updateInfo($uid, $password, $data);
            if($res['status']){
                $this->success('修改密码成功！');
            }else{
                $this->error($res['info']);
            }
        }else{
            $this->display();
        }
    }

    //输入邀请码
    public function invitation(){
        if (IS_POST){
            $invitation = I('invitation');
            $model = M('invitation_list');
            $userM = M('user');
            $where['code'] = $invitation;
            $res = $model->where($where)->select();
            if ($res[0]['use'] != 0){
                $this->error("您输入的邀请码已被使用");
            }else{

                $userinfo = userinfo($_COOKIE['qy_user']);
                if ($userinfo['level'] >= $res[0]['level']){
                    $this->error("您已是更高级的会员，无需使用该邀请码");
                    exit();
                }

                //此邀请码改为已使用状态
                $data['useid'] = $_COOKIE['qy_user'];
                $data['use'] = 1;
                $model->where($where)->save($data);


                //将该用户的会员等级修改
                $data2['level'] = $res[0]['level'];
                $where2['id'] = $_COOKIE['qy_user'];
                $userM->where($where2)->save($data2);
                $a = ($data2['level'])? "普通会员":"高级会员";
//                $info = "您已成为".$a."！快去看看吧~";
//                sys_notice($info,$_COOKIE['qy_user']);
                $this->success("您已成为".$a."！快去看看吧~");
            }

        }else{
            $this->assign('_title','输入邀请码');
            $this->display();
        }

    }

    //邀请券列表
    public function invitationList(){
        $model = M('invitation_list');
        $where['qy_invitation_list.uid'] = $_COOKIE['qy_user'];
        $data = $model
            ->join('qy_user on qy_invitation_list.uid = qy_user.id')
            ->where($where)
            ->field('*')
            ->select();
        $this->assign('list',$data);
        $this->display();
    }
    //myFollow 我的关注列表
    public function myFollow(){
        $model = M('user_follow');
        $uid = $_COOKIE['qy_user'];
        $where['qy_user_follow.uid'] = $uid;
        $where['qy_user_follow.status'] = 1;
        $data = $model
            ->join('qy_user on qy_user_follow.fuid = qy_user.id')
            ->where($where)
            ->select();
        $this->assign('list',$data);
        $this->display();
    }




    //test
    public function phpinfo(){
        $filename = "wxupload_14966982989294.amr";
        $name = "wxupload_14966982989294.mp3";
//        $from = "D:\\wwwroot\\qiyun\\wwwroot\\weixinrecord\\20170606\\";
        $from = "F:\\xampp\\htdocs\\qiyun\\weixinrecord\\20170606\\";
//        $str = "D:\\wwwroot\\qiyun\\wwwroot\\ffm\\bin\\ffmpeg.exe -i " . $from . $filename . " " . $from . $name." 2>&1";
        $str = "ffmpeg -i " . $from . $filename . " " . $from . $name." 2>&1";
//        exec($str,$callback);

        exec($str,$output,$retuen_val);
//        exec('cmd 2>&1',$output,$retuen_val);
        var_dump($output);

        $this->display('User:phpinfo');
    }

}



