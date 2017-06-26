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
            -> join("JOIN qy_user ON qy_user.id = qy_question.uid")
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

        require_once 'JSSDK.php';
        $jssdk       = new \JSSDK($this -> appid, $this -> AppSecret);
        $signPackage = $jssdk -> GetSignPackage();
        $this -> assign('jssdk', $signPackage);

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
            -> field('qy_user.uid,qy_user.face,qy_question_answer.id,qy_question_answer.money,qy_question_answer.num,qy_question_answer.content')
            -> where("pid={$question_id}")
            -> JOIN("JOIN qy_user ON qy_user.id = qy_question_answer.uid")
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
            $data['uid']     = $_COOKIE['qy_user'];
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
        $xglist                     = $question
            -> join('qy_question_answer on qy_question.id = qy_question_answer.pid')
            -> where($where)
            -> field("*")
            -> select();
        foreach ($xglist as $key => $value) {
            $xglist[$key]['questionlist'] = $this -> get_question_over($value['id']);
            $xglist[$key]['userinfo']     = $this -> userinfo($value['uid']); //提问者的基本信息
        }
        require_once 'JSSDK.php';
        $jssdk       = new \JSSDK($this -> appid, $this -> AppSecret);
        $signPackage = $jssdk -> GetSignPackage();
        $this -> assign('jssdk', $signPackage);
        $this -> assign('xglist', $xglist); //相关问答
        $this -> assign('info', $info);//提问详情
        $this -> assign('flag', $flag);
        $this -> assign('id', $id);
        $this -> assign('_title', '问题详情');
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
        $uid          = $_COOKIE['qy_user'];
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
        $this -> assign('is_answer', $is_answer);
        $this -> assign('_title', '回答问题');
        $this -> display();
    }

    //用户信息
    public function userinfo()
    {
        /*$uid = I('uid');
        if ($uid) {
            //用户基本信息
            $info = M('user') -> where("id={$uid}") -> field('username,nickname,company,position,area,face') -> find();
            if (empty($info['username'])) {
                $info['username'] = $info['nickname'];
            }
            $this -> assign('_title', '用户信息');
            $this -> display();
        } else {
            echo "<script>alert('访问的用户不存在');history.back()</script>";
        }*/
    }

    //提交回答
    public function uploadAnswer()
    {
        //server_id
        $media_id = I('serverId');
        $pid      = I('pid');
        /*if (empty($media_id) || $pid) {
            echo "<script>alert('请重试');history.back()</script>";
            exit();
        }*/
        require_once 'JSSDK.php';
        $jssdk        = new \JSSDK($this -> appid, $this -> AppSecret);
        $access_token = $jssdk -> getAccessToken();
//        $access_token = $this->get_token($this->appid,$this->AppSecret);

        $date    = date("Ymd", time());
        $path    = "./weixinrecord/" . $date;   //保存路径，相对当前文件的路径
        $outPath = "/qiyun/weixinrecord/";  //输出路径，给show.php 文件用，上一级

        if (!is_dir($path)) {
            //检查是否为目录，如果没有目录则创建一个目录
            mkdir($path);
        }

        //微信上传下载媒体文件接口
        $url = "https://api.weixin.qq.com/cgi-bin/media/get?access_token={$access_token}&media_id={$media_id}";
//        $url = "https://api.weixin.qq.com/cgi-bin/media/get/jssdk?access_token={$access_token}&media_id={$media_id}";

        $filename = "wxupload_" . time() . rand(1111, 9999) . ".amr";

        //存储获取的amr文件
        $this -> downAndSaveFile($url, $path . "/" . $filename);

        //存储的amr文件通过ffmpeg转换为mp3
//        $name = substr($filename, 0, -4) . ".mp3";
        $name = substr($filename, 0, -4) . ".amr";
        //本地调试
//        $from = "F:\\xampp\\htdocs\\qiyun\\weixinrecord\\" . $date . "\\";
//        $to   = "F:\\xampp\\htdocs\\qiyun\\weixinrecord\\" . $date . "\\";
//        $str = "ffmpeg -i " . $from . $filename . " " . $to . $name;
//        $r = system($str);//或者 exec($str);
        //删除之前的amr文件
//        unlink($from . $filename);

        //远程服务器
//        $savePath = "D:\\wwwroot\\qiyun\\wwwroot\\weixinrecord\\" . $date . "\\";
//        $cmd      = "ffmpeg -i " . $savePath . $filename . " " . $savePath . $name;
//        system($cmd);
//        unlink($savePath . $filename);
        //TODO:由于微信在服务器上转码有问题所以换为上传媒体素材在动过mediaID调用SDK播放语音


        //插入数据库
        $model              = M('question_answer');
        $model2             = M('answer_file');
        $path2              = "/weixinrecord/" . $date;
        $data1['pid']       = $pid;
        $data1['uid']       = $_COOKIE['qy_user'];
        $data1['content']   = $path2 . "/" . $name;
        $data1['addtime']   = time();
        $data1['media_id']  = $media_id;
        $data1['dead_time'] = time() + 60 * 60 * 60 * 48;
        $res                = $model -> add($data1);
        if ($res) {
            $data["code"] = 1;
            $data["msg"]  = "已提交";
        } else {
            $data["code"] = 0;
            $data["msg"]  = "提交失败";
        }


        // $data["url"] = $url;

//        echo json_encode($data);
        $this -> ajaxReturn($data);
    }

    //播放语音
    public function recordVoice()
    {
        if (IS_POST) {
            $id = I('id');
            require_once 'JSSDK.php';
            $jssdk        = new \JSSDK($this -> appid, $this -> AppSecret);
            $access_token = $jssdk -> getAccessToken();

            $model       = M('question_answer');
            $where['id'] = $id;
            $res         = $model -> where($where) -> find();
            $model -> where($where) -> setInc('num');
            $imgUrl      = "." . $res['content'];
            if (time() < $res['dead_time']) {
                $msg['status'] = 1;
                $msg['data']   = $res['media_id'];
                $msg['id']     = $id;
            } else {
                $URL  = 'http://file.api.weixin.qq.com/cgi-bin/media/upload?access_token=' . $access_token . '&type=voice';
                $file = realpath($imgUrl); //要上传的文件
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
                $msg['status'] = 1;
                $msg['data']   = $data['media_id'];
                $msg['id']     = $id;
                //更新media_id 和过期时间
                $model          = M('question_answer');
                $where['id']    = $id;
                $d['media_id']  = $data['media_id'];
                $d['dead_time'] = time() + 60 * 60 * 60 * 48;
                $model -> where($where) -> save($d);
                //$msg['url'] = $URL;
//            $msg['ac'] = $access_token;
//            $msg['a'] = $imgUrl;
//            $msg['b'] = $file;
            }
            $this -> ajaxReturn($msg);
        } else {
            $msg['status'] = 0;
            $msg['data']   = "请求方式错误";
            $this -> ajaxReturn($msg);
        }

    }

    public function curl_post($url, $data = null)
    {
        //创建一个新cURL资源
        $curl = curl_init();
        //设置URL和相应的选项
        curl_setopt($curl, CURLOPT_URL, $url);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //执行curl，抓取URL并把它传递给浏览器
        $output = curl_exec($curl);
        //关闭cURL资源，并且释放系统资源
        curl_close($curl);
        return $output;
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

    function get_token($appId, $appSecret)
    {
        $url  = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appId . "&secret=" . $appSecret;
        $data = json_decode(file_get_contents($url), true);
        if ($data['access_token']) {
            return $data['access_token'];
        } else {
            echo "Error";
            exit();
        }
    }


}