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
					$this->success('添加成功',U('shop/index'));
				}else{
					$this->error('添加失败',U('shop/index'));
				}
			}
		}
		if($id){
			$info = $shop->where("id={$id}")->find();
			$this->assign('info',$info);
		}
		$levelM = M('member_type');
		$level = $levelM->where('status=1')->field('id,title')->select();
		$this->assign('level',$level);
		$this->meta_title = '新增商品';
        $this->display();
	}

	public function wareinfo(){
	    $model = M('member_type');
	    $list = $model->field(true)->select();
	    trace($list);
	    $this->assign('list',$list);
	    $this->display();
    }
    public function addWare(){
	    if (IS_POST){
	        $data = $_POST;
	        $data['create_time'] = time();
	        $model = M('member_type');
	        if (I('id')){
                $where['id'] = I('id');
                $data['update_time'] = time();
                $res = $model->where($where)->save($data);
            }else{
                $res = $model->add($data);
            }


	        if ($res){
	            $this->success('操作成功',U('Shop/wareinfo'));
            }else{
	            $this->error("操作失败，请稍后重试",U('Shop/wareinfo'));
            }
        }else{
	        $id = I('id')? I('id') : 0;
            $model = M('member_type');
            $where['id'] = $id;
            $data = $model->where($where)->select();
            $this->meta_title = '新增会员种类';
            $this->assign('data',$data[0]);
            $this->assign('id',$id);
            $this->display();
        }

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
                $this->success('操作成功');
                break;
            case 'forbiduser2':
                $this->forbid('member_type', $map );
                $this->success('操作成功');
                break;
            case 'resumeuser':
                $this->resume('Shop', $map );
                $this->success('操作成功');
                break;
            case 'resumeuser2':
                $this->resume('member_type', $map );
                $this->success('操作成功');
                break;
            case 'deleteuser':
                //$this->delete('Shop', $map );
				M('shop')->where($map)->delete();
                $this->success('操作成功');
                break;
            case 'deleteuser2':
                //$this->delete('Shop', $map );
                M('member_type')->where($map)->delete();
                $this->success('操作成功');
                break;
            default:
                $this->error('参数非法');
        }
    }

    public function test($cate_id = null, $model_id = null, $position = null,$group_id=null){

    }

}
