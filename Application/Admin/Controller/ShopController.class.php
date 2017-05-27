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
 * 后台商品控制器
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
class ShopController extends AdminController {

    /**
     * 后台首页
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function index(){
		
		$title = I('title');
		if($title){
			$map['title'] = ['like','%'.$title.'%'];
		}
		$list = $this->lists('shop',$map);
		
		$this->assign('_list',$list);
        $this->meta_title = '商品列表';
        $this->display();
    }
	
	
	public function add(){
		$shop = M('shop');
		$id = I('id');
		if(IS_POST){
			if($id){
				$_POST['addtime'] = time();
				$re = $shop->where("id={$id}")->save($_POST);
				if($re){
					$this->success('更新成功');
				}else{
					$this->error('更新失败');
				}
			}else{
				$_POST['addtime'] = time();
				$re = $shop->add($_POST);
				if($re){
					$this->success('添加成功','Shop/index');
				}else{
					$this->error('添加失败','Shop/index');
				}
			}
		}
		if($id){
			$info = $shop->where("id={$id}")->find();
			$this->assign('info',$info);
		}
		$this->meta_title = '新增商品';
        $this->display();
	}
	
	
	/**
     * 会员状态修改
     * @author 朱亚杰 <zhuyajie@topthink.net>
     */
    public function changeStatus($method=null){
        $id = array_unique((array)I('id',0));
        
        $id = is_array($id) ? implode(',',$id) : $id;
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map['id'] =   array('in',$id);
        switch ( strtolower($method) ){
            case 'forbiduser':
                $this->forbid('Shop', $map );
                break;
            case 'resumeuser':
                $this->resume('Shop', $map );
                break;
            case 'deleteuser':
                //$this->delete('Shop', $map );
				M('shop')->where($map)->delete();
                break;
            default:
                $this->error('参数非法');
        }
    }

}
