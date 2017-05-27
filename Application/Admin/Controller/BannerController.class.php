<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
namespace Admin\Controller;
/**
 * 文件控制器
 * 主要用于下载模型的文件上传和下载
 */
class BannerController extends AdminController {

	

    public function index(){
		$title = I('title');
        if($title){
            $map['title'] = ['like','%'.$title.'%'];
        }
		$list = $this->lists('Banner',$map);
		
		$this->assign('_list',$list);
		$this->meta_title = '广告列表';
        $this->display();
	}
	
	public function add(){
		$id = I('id');
		$Banner = M('Banner');
		if(IS_POST){
			if($_POST['id']){
				$re = $Banner->where("id={$_POST['id']}")->save($_POST);
			}else{
				$re = $Banner->add($_POST);
			}
			if($re !== false){
				$this->success('操作成功');
			}else{
				$this->error('操作失败');
			}
		}
		if($id){
			$info = $Banner->where("id={$id}")->find();
			$this->assign('info',$info);
		}
		$this->meta_title = '广告详情';
        $this->display();
	}
	
	public function changeStatus($method=null){
        $id = array_unique((array)I('id',0));
        
        $id = is_array($id) ? implode(',',$id) : $id;
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map['id'] =   array('in',$id);
        switch ( strtolower($method) ){
            case 'forbiduser':
                $this->forbid('Banner', $map );
                break;
            case 'resumeuser':
                $this->resume('Banner', $map );
                break;
            case 'deleteuser':
                //$this->delete('Shop', $map );
				M('Banner')->where($map)->delete();
                break;
            default:
                $this->error('参数非法');
        }
    }
	
	public function info(){
		$id = I('id');
		$where['id'] = $id;
		$info = M('Banner')->where($where)->find();
		
		$this->assign('info',$info);
		$this->meta_title = '广告详情';
        $this->display();
	}
}
