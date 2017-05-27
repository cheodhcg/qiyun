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
class IndexController extends HomeController
{


    //系统首页
    public function index()
    {

        $question = M('question');
        $id       = I('id');
        $p        = I('p');
        if ($id) {
            $where['qy_question.type'] = array('like', '%' . sprintf('%04d', $id) . '%');
        } else {
            $where['qy_question.is_tj'] = 1;
        }
        //获取推荐的问答培训
        $count = $question -> where($where) -> count();// 查询满足要求的总记录数 $map表示查询条件
        $Page  = new \Think\Page($count, 10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show  = $Page -> show();// 分页显示输出
        // 进行分页数据查询

        $field = "qy_question.id,qy_question.title,qy_question.content,qy_user.nickname,qy_user.company,qy_user.area,qy_user.position";
        $list  = $question -> where($where) -> order('id')
            -> join("JOIN qy_user ON qy_user.uid = qy_question.uid")
            //->join("JOIN qy_question_answer ON qy_question_answer.pid = qy_question.id")
            -> limit($Page -> firstRow . ',' . $Page -> listRows)
            -> order('id DESC')
            -> field($field)
            -> select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条
        if ($list) {
            foreach ($list as $key => $value) {
                $list[$key]['questionlist'] = $this -> get_question_over($value['id']);
            }
        }
        if ($p > 1) {
            if ($list) {
                $this -> success($list);
                exit;
            } else {
                $this -> error('没有更多信息');
                exit;
            }
        }

        $this -> assign('list', $list);// 赋值数据集
        $this -> assign('cate_list', $this -> cate_list);//分类列表
        $this -> assign('type', $id ? $id : 0);
        $this -> assign('page', count($list) == 10 ? "1" : "0");
        $this -> display();
    }

    /*
    * 获取问题回答列表
    * type 是否查询所有
    */
    public function get_question_over($question_id, $type = '')
    {
        $question_answer = M('question_answer');
        $list            = $question_answer
            -> field('qy_user.uid,qy_user.face,qy_question_answer.money,qy_question_answer.num,qy_question_answer.content')
            -> where("pid={$question_id}")
            -> JOIN("JOIN qy_user ON qy_user.uid = qy_question_answer.uid")
            -> select();
        if (empty($type)) { //否，只查询一条记录
            $list = $list[0];
        }
        return $list;
    }

    //普通会员发布提问
    public function question_release()
    {
        if (IS_POST) {
            $type = I('type');
            foreach ($type as $key => $value) {
                $type[$key] = sprintf('%04d', $value);
            }
            $data['title']   = I('title');
            $data['content'] = I('content');
            $data['type']    = implode(',', $type);
            $data['uid']     = session('uid');
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
        $this -> assign('cate_list', $this -> cate_list);//分类列表
        $this -> display();
    }

    /**
     * 问答详情
     */
    public function questioninfo()
    {
        $id              = I('id');
        $question        = M('question');
        $question_answer = M('question_answer');
        $flag            = false;
        //获取专业会员回答列表
        $info                 = $question
            -> where("id={$id}")
            -> field("id,uid,title,content,type")
            -> find();
        $info['questionlist'] = $this -> get_question_over($info['id'], 1);
        $info['userinfo']     = $this -> userinfo($info['uid']);
        $info['number']       = count($info['questionlist']);
        //验证该用户是否回答，如果回答 页面我要回答变灰
        $uids = array_column($info['questionlist'], 'uid');
        if (in_array(session('uid'), $uids)) {
            $flag = true;
        }
        //相关问题
        $where['qy_question.type']  = ['like', '%' . sprintf('%04d', $info['type']) . '%'];
        $where['qy_question.id']    = ['neq', $id];
        $where['qy_question.is_tj'] = 1;
        $xglist                       = $question
            ->join('qy_question_answer on qy_question.id = qy_question_answer.pid')
            -> where($where)
            -> field("*")
            -> select();
        foreach ($xglist as $key => $value) {
            $xglist[$key]['questionlist'] = $this -> get_question_over($value['id']);
            $xglist[$key]['userinfo']     = $this -> userinfo($value['uid']); //提问者的基本信息
        }
        $this -> assign('xglist', $xglist); //相关问答
        $this -> assign('info', $info);//提问详情
        $this -> assign('flag', $flag);
        $this -> display();
    }

    //回答提问
    public function answer()
    {
        $id              = I('id');
        $question        = M('question');
        $question_answer = M('question_answer');
        //获取问题详细信息
        $info             = $question -> where("id={$id}") -> field("id,uid,title,content") -> find();
        $info['userinfo'] = $this -> userinfo($info['uid']);
        $info['number']   = $question_answer -> where("pid={$id}") -> count();
        //验证该问题该用户是否已回答过
//        $uid = session('user');
        $uid          = $_COOKIE['qiyun_user'];
        $where['uid'] = $uid;
        $where['pid'] = $id;
        $re           = $question_answer -> where($where) -> find();

        if ($re) {
            $is_answer = true;
        } else {
            $is_answer = false;
        }
        //回答该问题的列表
        $xglist = $question_answer
            -> join('qy_user on qy_question_answer.uid = qy_user.id')
            -> where("pid={$info['id']}")
            -> field("qy_question_answer.*,qy_user.face,qy_user.nickname,qy_user.username")
            -> select();
        foreach ($xglist as $key => $value) {
            $xglist[$key]['userinfo'] = $this -> userinfo($value['uid']); //提问者的基本信息
        }
        //微信调用前面

        require_once 'JSSDK.php';
        $jssdk       = new \JSSDK($this -> appid, $this -> AppSecret);
        $signPackage = $jssdk -> GetSignPackage();
        $this -> assign('jssdk', $signPackage);

        $this -> assign('info', $info);
        $this -> assign('pid', $id);
        $this -> assign('xglist', $xglist);
//        var_dump($xglist);
        $this -> assign('is_answer', $is_answer);
        $this -> display();
    }

    //用户信息
    public function userinfo($uid)
    {
        if ($uid) {
            //用户基本信息
            $info = M('user') -> where("uid={$uid}") -> field('username,nickname,company,position,area,face') -> find();
            if (empty($info['username'])) {
                $info['username'] = $info['nickname'];
            }
        } else {
            $info = "";
        }
        return $info;
    }

    //提交回答
    public function uploadAnswer()
    {
        //server_id
        $media_id = I('serverId');
        $pid      = I('get.pid');
        require_once 'JSSDK.php';
        $jssdk        = new \JSSDK($this -> appid, $this -> AppSecret);
        $access_token = $jssdk -> getAccessToken();

        $date    = date("Ymd", time());
        $path    = "/weixinrecord/" . $date;   //保存路径，相对当前文件的路径
        $outPath = "/qiyun/weixinrecord/";  //输出路径，给show.php 文件用，上一级

        if (!is_dir($path)) {
            //检查是否为目录，如果没有目录则创建一个目录
            mkdir($path);
        }

        if (!is_dir($path)) {
            //检查是否为目录，如果没有目录则创建一个目录
            mkdir($path);
        }

        //微 信上传下载媒体文件
        $url = "https://api.weixin.qq.com/cgi-bin/media/get?access_token={$access_token}&media_id={$media_id}";
//        $url = "https://file.api.weixin.qq.com/cgi-bin/media/get?access_token={$access_token}&media_id={$media_id}";

        $filename = "wxupload_" . time() . rand(1111, 9999) . ".amr";
        //存储获取的amr文件
        $this -> downAndSaveFile($url, $path . "/" . $filename);
        //存储的amr文件通过ffmpeg转换为mp3
        $name = substr($filename, 0, -4) . ".mp3";
        $from = "F:\\xampp\\htdocs\\qiyun\\weixinrecord\\" . $date . "\\";
        $to   = "F:\\xampp\\htdocs\\qiyun\\weixinrecord\\" . $date . "\\";
        $str  = "ffmpeg -i " . $from . $filename . " " . $to . $name;
        system($str);//或者 exec($str);
        //删除之前的amr文件
        unlink($from . $filename);


        //TODO:插入数据库
        $model            = M('question_answer');
        $model2           = M('answer_file');
        $data1['pid']     = $pid;
        $data1['uid']     = $_COOKIE['qiyun_user'];
        $data1['content'] = $path . "/" . $name;
        $res              = $model -> add($data1);
        if ($res) {
            $data["code"] = 1;
            $data["path"] = $outPath . $name;
            $data["msg"]  = "已提交";
        } else {
            $data["code"] = 0;
            $data["path"] = $outPath . $name;
            $data["msg"]  = "提交失败";
        }


        // $data["url"] = $url;

        echo json_encode($data);

    }

    //根据URL地址，下载文件
    public function downAndSaveFile($url, $savePath)
    {
        ob_start();
        readfile($url);
        $img = ob_get_contents();
        ob_end_clean();
        $size = strlen($img);
        $fp   = fopen($savePath, 'a');
        fwrite($fp, $img);
        fclose($fp);

    }

    public function test()
    {

        $this -> display();
    }

    public function test2()
    {
        $date     = date("Ymd", time());
        $filename = "wxupload_14956950955445.amr";
        $name     = substr($filename, 0, -4) . ".mp3";
        $from     = "F:\\xampp\\htdocs\\qiyun\\weixinrecord\\" . $date . "\\";
        $to       = "F:\\xampp\\htdocs\\qiyun\\weixinrecord\\" . $date . "\\";
        $str      = "ffmpeg -i " . $from . $filename . " " . $to . $name;
        $res      = system($str);//或者 exec($str);
        //删除之前的amr文件
        unlink($from . $filename);
        var_dump($res);
    }

}