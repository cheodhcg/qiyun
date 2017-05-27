<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Admin\Controller;
use User\Api\UserApi as UserApi;

/**
 * 后台首页控制器
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
class ContactController extends AdminController {

	public function add(){
		if(IS_POST){
			$data['title'] = $_POST['title'];
			$data['cid'] = $_POST['cid'];
			$data['icon'] = M('picture')->where("id={$_POST['cover_id']}")->getField('path');
			$data['content'] = $_POST['content'];
			$data['addtime'] = time();
			$id = M('News')->add($data);
			if($id){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}
		
		$category = M('category');
		$list = $category->where("pid=1")->field('id,title')->select();
		$this->assign('list',$list);
		$this->meta_title = '新增资讯';
        $this->display();
	}

    /**
     * 后台首页
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function index(){
		$list = $this->lists('News');
		foreach($list as $key => $value){
			$list[$key]['type_txt'] = M('category')->where("id={$value['cid']}")->getField('title');
		}
		$this->assign('_list',$list);
        $this->meta_title = '资讯列表';
        $this->display();
    }
	
	
	public function info(){
		$new = M('News');
		$category = M('category');
		$id = I('id');
		if(IS_POST){
			if($_POST['is_tj']){
				$data['is_tj'] = 1;
				$re = $new->where("id={$id}")->save($data);
			}
			if($_POST['status']){
				$re = $new->where("id={$id}")->delete();
			}
			if($re !== false){
				$this->success('操作成功');
			}else{
				$this->error('操作失败');
			}
		}
		$info = $new->where("id={$id}")->find();
		$info['type_txt'] = $category->where("id={$info['cid']}")->getField('title');
		
		$this->assign('info',$info);
        $this->meta_title = '资讯详情';
        $this->display();
    }


    public function changeStatus(){
    	$id = array_unique((array)I('id',0));
    	$id = is_array($id) ? implode(',',$id) : $id;
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map['id'] =   array('in',$id);
        $re =  M('News')->where($map)->delete();
        if($re !== false){
        	$this->success('删除成功');
        }else{
        	$this->error('删除失败');
        }
    }
}
