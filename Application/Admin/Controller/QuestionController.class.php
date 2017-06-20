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
class QuestionController extends AdminController {

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

    public function index(){
		$title = I('title');
        if($title){
            $map['title|username'] = ['like','%'.$title.'%'];
        }
		$list = $this->lists('Question',$map);
		foreach ($list as $key => $value) {
            $list[$key]['type_txt'] = $this->get_type_txt($value['type']);
        }
		$this->assign('_list',$list);
		$this->meta_title = '问答列表';
        $this->display();
	}
	
	public function info(){
		$id = I('id');
		$where['id'] = $id;
		$info = M('Question')->where($where)->find();
		$info['type_txt'] = $this->get_type_txt($info['type']);
		$info['list'] = M('question_answer')->where(["pid"=>$id])->select();
		//var_dump($info);
		$this->assign('info',$info);
		$this->meta_title = '问题详情';
        $this->display();
	}
	public function setTj(){
	    $id= I('id');
	    $status = I('status');
        $model = M('question');
        $data['is_tj'] = $status;
        $res = $model->where('id='.$id)->save($data);
        if($res){
            $this->success("操作成功！");
        }else{
            $this->error('操作失败！');
        }
    }
}
