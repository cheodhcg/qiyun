<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Admin\Model\AuthGroupModel;
/**
 * 文件控制器
 * 主要用于下载模型的文件上传和下载
 */
class LectureController extends AdminController {

    //获取讲座类型
    public function get_type_txt($type){
        $category = M('category');
        $where['id'] = array('in',$type);
        $list = $category->where($where)->field('title')->select();
        $title = "";
        foreach ($list as $key => $value) {
            $title .= $value['title'].',';
        }
        return substr($title, 0,-1);
    }

    //获取所有的讲座列表
    public function index(){
        $cate_id = I('cate_id');
        $title = I('title');
        if($cate_id){
            $map['type'] = array('like','%'.sprintf('%04d',$cate_id).'%');
        }
        if($title){
            $map['title|username'] = ['like','%'.$title.'%'];
        }
        $list = $this->lists('Lecture',$map);
        foreach ($list as $key => $value) {
            $list[$key]['type_txt'] = $this->get_type_txt($value['type']);
        }
        $this->assign('_list',$list);
        $this->getMenu();
        $this->meta_title = '讲座列表';
        $this->display();
    }


    /**
    * 获取某个讲座的详细信息
    */
    public function info(){
        $Lecture = M('Lecture');
        $id = I('id');
        if(IS_POST){
            $data['is_tj'] = I('is_tj');
            $re = $Lecture->where("id={$id}")->save($data);
            if($re !== false){
                $this->success('操作成功');
            }else{
                $this->error('操作失败');
            }
        }
        $info = $Lecture->where("id={$id}")->find();
        $info['type_txt'] = $this->get_type_txt($info['type']);
        $this->getMenu();
        $this->assign('info',$info);
        $this->meta_title = '讲座详情';
        $this->display();
    }


    /**
    * 更新推荐状态
    */
    public function changeStatus(){
        $Lecture = M('Lecture');
        $id = I('id');
        $data['is_tj'] = I('status');
        $re = $Lecture->where("id={$id}")->save($data);
        if($re !== false){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }


    /**
     * 显示左边菜单，进行权限控制
     * @author huajie <banhuajie@163.com>
     */
    protected function getMenu(){
        //获取动态分类
        $cate_auth  =   AuthGroupModel::getAuthCategories(UID); //获取当前用户所有的内容权限节点
        $cate_auth  =   $cate_auth == null ? array() : $cate_auth;
		$where['id'] = 1;
		$where['pid'] = 1;
		$where['_logic'] = "OR";
        $cate       =   M('Category')->where($where)->field('id,title,pid,allow_publish')->order('pid,sort')->select();
        //没有权限的分类则不显示
        if(!IS_ROOT){
            foreach ($cate as $key=>$value){
                if(!in_array($value['id'], $cate_auth)){
                    unset($cate[$key]);
                }
            }
        }

        $cate           =   list_to_tree($cate);    //生成分类树
        //获取分类id
        $cate_id        =   I('param.cate_id');
        $this->cate_id  =   $cate_id;

        //是否展开分类
        $hide_cate = false;
        if(ACTION_NAME != 'recycle' && ACTION_NAME != 'draftbox' && ACTION_NAME != 'mydocument'){
            $hide_cate  =   true;
        }

        //生成每个分类的url
        foreach ($cate as $key=>&$value){
            $value['url']   =   'Lecture/index?cate_id='.$value['id'];
            if($cate_id == $value['id'] && $hide_cate){
                $value['current'] = true;
            }else{
                $value['current'] = false;
            }
            if(!empty($value['_child'])){
                $is_child = false;
                foreach ($value['_child'] as $ka=>&$va){
                    $va['url']      =   'Lecture/index?cate_id='.$va['id'];
                    if(!empty($va['_child'])){
                        foreach ($va['_child'] as $k=>&$v){
                            $v['url']   =   'Lecture/index?cate_id='.$v['id'];
                            $v['pid']   =   $va['id'];
                            $is_child = $v['id'] == $cate_id ? true : false;
                        }
                    }
                    //展开子分类的父分类
                    if($va['id'] == $cate_id || $is_child){
                        $is_child = false;
                        if($hide_cate){
                            $value['current']   =   true;
                            $va['current']      =   true;
                        }else{
                            $value['current']   =   false;
                            $va['current']      =   false;
                        }
                    }else{
                        $va['current']      =   false;
                    }
                }
            }
        }
        $this->assign('nodes',      $cate);
    }
}
