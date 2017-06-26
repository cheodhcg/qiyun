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
		$info['list'] = M('question_answer')->where("pid=".$id)->select();
		//var_dump($info);
        $list = M('question_answer')
            ->join('qy_user on qy_question_answer.uid = qy_user.id')
            ->where("pid=".$id)
            ->field('qy_user.username,qy_question_answer.*')
            ->select();
		$this->assign('info',$info);
		$this->assign('list',$list);
		$this->assign('pid',$id);
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
    //后台新增问答
    public function add(){
        if (IS_POST) {
            $type = I('type');
            foreach ($type as $key => $value) {
                $type[$key] = sprintf('%04d', $value);
            }
            $data['title']   = I('title');
            $data['content'] = I('content');
            $data['type']    = implode(',', $type);
            $data['uid']     = 1;//在后台提交的数据都默认绑定为后台账号，uid:1
            $data['addtime'] = time();
            $id              = M('question') -> add($data);
            if ($id) {
                $this -> success('提问成功,请等待专业人士回答', U('Index/index'));
                exit;
            } else {
                $this -> error('提问失败');
                exit;
            }
        }
        $list = M('category')->where("pid=1")->field('id,title')->select();
        $this->assign('cate_list',$list);
	    $this->display();
    }
    public function addAnswer(){
        if(IS_POST){
            require_once 'JSSDK.php';
            $jssdk        = new \JSSDK($this -> appid, $this -> AppSecret);
            $access_token = $jssdk -> getAccessToken();
            //添加
            $date    = date("Ymd", time());
            $path    = "./weixinrecord/" . $date;   //保存路径，相对当前文件的路径
            $ext = substr(strrchr($_FILES['file']['name'], '.'), 1);
            $allowType = array('mp3','amr','m4a');
            if (!in_array($ext,$allowType)){
                $this->error("请上传有效的文件格式");
                exit();
            }
            $filename = "wxupload_" . time() . rand(1111, 9999) . ".".$ext;//保存的文件名字

            if (!is_dir($path)) {
                //检查是否为目录，如果没有目录则创建一个目录
                mkdir($path);
            }
            move_uploaded_file($_FILES["file"]["tmp_name"], $path."/" . $filename);
            //上传至微信服务器
            $file = $path."/" . $filename;

        /*    var_dump($access_token);
            exit();*/
        //TODO:这里好像没有获取到access_token的值，倒是上传的语音素材失败
            $URL  = 'http://file.api.weixin.qq.com/cgi-bin/media/upload?access_token=' . $access_token . '&type=voice';
            $file = realpath($file); //要上传的文件
//            $fields['media'] = '@'.$file;
            $fields['media'] = new \CURLFile($file);
            $ch              = curl_init($URL);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                return curl_error($ch);
            }
            curl_close($ch);
            $data          = @json_decode($result, true);

            $model          = M('question_answer');
            $d['pid']  = I('get.id');
            $d['uid']  = 1;
            $d['content'] = substr($path,1)."/" . $filename;
            $d['media_id']  = $data['media_id'];
            $d['dead_time'] = time() + 60 * 60 * 60 * 48;
            $res = $model -> add($d);
            if ($res){
                $this->success("添加成功！",U('Question/index'));
            }else{
                $this->error("添加失败！",U('Question/index'));
            }
        }
        $id = I('id');
        $where['id'] = $id;
        $info = M('Question')->where($where)->find();
        $this->assign('info',$info);
        $this->display();
    }
    //获取文件后缀
    public function get_extension($file)
    {
        substr(strrchr($file, '.'), 1);
    }
}
