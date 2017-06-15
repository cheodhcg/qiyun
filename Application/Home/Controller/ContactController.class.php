<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;

/**
 * 人脉圈业务控制器
 */

class ContactController extends HomeController {
	
	//显示会员信息列表
	public function index(){
		$user = M('user');
		$category = M('category');
		$catelist = $category->where("pid=42")->field('id,title')->select();
		//获取用户
		$cate_id = I('cate_id');
		$p = I('p');
		if($cate_id){
			$where['position'] = $cate_id;
		}
		$count = $user->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
	    $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
	    //$show = $Page->show();// 分页显示输出
	    // 进行分页数据查询
		$field = "qy_user.id,qy_user.username,qy_user.face,qy_user.company,qy_category.title,qy_user.content,qy_user_follow.status";
	    $list = $user->where($where)->order('qy_user.id')
//	    		->join("JOIN qy_category ON qy_category.id = qy_user.position")
//	    		->join("JOIN qy_user_follow ON qy_user.uid = qy_user_follow.fuid")
//	    		->limit($Page->firstRow.','.$Page->listRows)
	    		->field(true)
	    		->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条
//        echo $user->getLastSql();

	    if($p > 1){
			if($list){
				$this->success($list);exit;
			}else{
				$this->error('没有更多的信息');exit;
			}
		}
	    $this->assign('list',$list);// 赋值数据集 
        $this->assign('page',$page);
        $this->assign('catelist',$catelist);
        $this->assign('cate_id',$cate_id?$cate_id:0);
        $this->assign('page',count($list) == 10 ? "1" : "0");
        $this->display();
	}

	//发布信息
	public function release_news(){
		if(IS_POST){
			if($_FILES['icon']){
    			$icon = _upload($_FILES['icon'],'New/');
    		}
    		$data['title'] = $_POST['title'];
    		$data['uid'] = $_COOKIE['qiyun_user'];
    		$data['icon'] = $icon;
    		$data['cid'] = $_POST['cid'];
    		$data['content'] = $_POST['content'];
    		$data['addtime'] = time();
    		$id = M('news')->add($data);
    		if($id){
    			$this->success('发布成功');
    		}else{
    			$this->error('发布失败');
    		}
		}else{
			$this->assign('cate_list',$this->cate_list);
			$this->display();
		}
	}

	//新闻列表
	public function news(){
		$new = M('news');
		$cate_id = empty(I('cate_id')) ? 1 : I('cate_id');
		$p = I('p');
		if($cate_id){
			$where['qy_news.cid'] = $cate_id;
		}else{
			$where['qy_news.is_tj'] =  1;
		}
		$count = $new->where($where)->count();// 查询满足要求的总记录数
	    $Page = new \Think\Page($count,5);
		$list = $new->where($where)
				->field('qy_news.title,qy_news.id,qy_news.icon,qy_news.addtime')
				->join("JOIN qy_category ON qy_category.id = qy_news.cid")
				->order('qy_news.id DESC')
				->limit($Page->firstRow.','.$Page->listRows)
				->select();
		if($list){
			foreach ($list as $key => $value) {
				$list[$key]['addtime'] = timediff($value['addtime']);
			}
		}
		if($p > 1){
			if($list){
				$this->success($list);exit;
			}else{
				$this->error('没有更多的信息');exit;
			}
		}
		$this->assign('cate_list',$this->cate_list);
		$this->assign('list',$list);
		$this->assign('page',count($list) == 5 ? "1" : "0");
		$this->assign('cate_id',$cate_id?$cate_id:0);
		$this->display();
	}

	public function info(){
		$id = I('id');
		
		$new = M('News');
		$info = $new->where("id={$id}")->find();
		$this->assign('info',$info);
		$this->display();
	}
	

	public function search(){
		$title = I('title');
		if(empty($title)){
			$list = [];
		}else{
			$where['title'] = ['like','%'.$title.'%'];
			$list = M('news')->where($where)->field('id,title,icon,content')->select();
		}
		$this->assign('list',$list);
		$this->display();
	}
}
