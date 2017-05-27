<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class LectureController extends HomeController {



	//系统首页
    public function index(){
    	$Lecture = M('Lecture');
        $id = I('id');
        $p = I('p');
        if($id){
        	$where['type'] = array('like','%'.sprintf('%04d',$id).'%');
        }else{
        	$where['is_tj'] = 1;
        }
        //获取推荐的问答培训
        $field = "id,title,content,money,icon,number";
	    $count = $Lecture->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
	    $Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
	    $show = $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $list = $Lecture->where($where)->order('id DESC')
	    		->limit($Page->firstRow.','.$Page->listRows)
	    		->field($field)
	    		->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条
        if($p > 1){
            if($list){
                $this->success($list);exit;
            }else{
                $this->error('没有更多信息');exit;
            }
        }
	    $this->assign('list',$list);// 赋值数据集
        $this->assign('cate_list',$this->cate_list);//分类列表
        $this->assign('type',$id?$id:0);
        $this->assign('page',count($list) == 5 ? "1" : "0");
        $this->display();
    }

    //专业会员才能发起 讲座
    public function lecture_release(){
    	if(IS_POST){
    		if($_FILES['icon']){
    			$icon = _upload($_FILES['icon'],'Jiangzuo/');
    		}else{
    			$this->error('请上传封面图片');
    		}
    		if($_FILES['content_icon']){
    			$content_icon = _upload($_FILES['content_icon'],'Jiangzuo/');
    		}
    		$type = I('type');
    		foreach ($type as $key => $value) {
    			$type[$key] = sprintf('%04d',$value);
    		}
    		$data['title'] = I('title');
    		$data['content'] = I('content');
    		$data['type'] = implode(',',$type);
    		$data['money'] = I('money');
    		$data['icon'] = $icon;
    		$data['content_icon'] = $content_icon;

    		$id = M('Lecture')->add($data);
    		if($id){
    			$this->success('发布成功');
    		}else{
    			$this->error('发布失败');
    		}
    	}else{
        	$this->assign('cate_list',$this->cate_list);//分类列表
        	$this->display();
        }
    }

    /**
    * 讲座详情
    */
    public function lectureinfo(){
    	$id = I('id');
    	$Lecture = M('Lecture');
        $lecture_like = M('lecture_like');
    	$info = $Lecture->where("id={$id}")->field("id,title,content,money,icon,rewardnum,content_icon")->find();
        $list = $lecture_like->where("pid={$id}")->field('uid')->select();
        if($list){
            $uids = array_column($list,'uid');
            $where['uid'] = ['in',$uids];
            $userlist = M('user')->where($where)->field('nickname')->limit(3)->select();
            $info['likelist'] = implode(',', array_column($userlist,'nickname'));
        }else{
            $info['likelist'] = '赞无点赞,赶快点赞吧';
        }
    	$this->assign('info',$info);//分类列表
    	$this->display();
    }


    /**
    * 用户打赏，打赏金额后台控制
    * 目前是直接添加金额，需要微信支付后才能增加(微信申请成功后在修改)
    */
    public function reward(){
        $id = I('id');
        $uid = session('uid');
        $data['uid'] = $uid;
        $data['type'] = 3;
        $data['money'] = C('SYS_REWARD_MONEY');
        $data['addtime'] = time();
        if(M('user_money_log')->add($data) !== false){
            $lecture_uid = M('lecture')->where("id={$id}")->getField('uid');
            M('user')->where("uid={$lecture_uid}")->setInc('total_money',C('SYS_REWARD_MONEY')); //更新用户的总金额
            M('user')->where("uid={$lecture_uid}")->setInc('user_money',C('SYS_REWARD_MONEY')); //更新用户的余额
            M('lecture')->where("id={$id}")->setInc('rewardnum',1); //更新当前讲座的打赏次数
            $this->success('打赏成功,感谢您的支持');
        }else{
            $this->error('打赏失败');
        }
    }


    /**
    * 用户点赞
    */
    public function like(){
        $uid = session('uid');
        $id = I('id');
        if(empty($id)){
            $this->error('点赞失败');exit;
        }
        $lecture_like = M('lecture_like');
        $pid = $lecture_like->where("uid={$uid}")->getField('pid');
        if($pid){
            $this->error('您已点赞过,请勿重新点赞哦');exit;
        }
        $data['pid'] = $id;
        $data['uid'] = $uid;
        $data['addtime'] = time();
        if($lecture_like->add($data) !== false){
            $this->success('点赞成功,感谢您的参与');
        }else{
            $this->error('点赞失败');
        }
    }

}