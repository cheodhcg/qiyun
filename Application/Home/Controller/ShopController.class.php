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
 * 商城业务控制器
 */

class ShopController extends HomeController
{

    public function index()
    {
        $shop            = M('shop');
        $p               = I('p');
        $where['status'] = 1;
        $count           = $shop -> where($where) -> count();// 查询满足要求的总记录数 $map表示查询条件
        $Page            = new \Think\Page($count, 8);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show            = $Page -> show();// 分页显示输出
        // 进行分页数据查询
        $field = "id,title,money,cover_id";
        $list  = $shop -> where($where) -> order('id')
            -> limit($Page -> firstRow . ',' . $Page -> listRows)
            -> field($field)
            -> select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条
        if ($list) {
            foreach ($list as $key => $value) {
                $list[$key]['path'] = M('picture') -> where("id={$value['cover_id']}") -> getField('path');
            }
        }
        if ($p > 1) {
            if ($list) {
                $this -> success($list);
                exit;
            } else {
                $this -> error('没有更多的信息');
                exit;
            }
        }
        $this -> assign('list', $list);// 赋值数据集
//        var_dump($list);
        //获取广告
        $bannerlist = $shop -> where("status=1 and is_tj = 1") -> field('id,cover_id') -> select();
        $this -> assign('bannerlist', $bannerlist);
        $this -> assign('page', count($list) == 8 ? "1" : "0");
        $this -> display();
    }


    public function info()
    {
        $id = I('id');
        if (empty($id)) {
            $this -> error('请选择一个商品');
        }
//        echo think_encrypt("adadqwe5123_ad1!");
        $shop = M('shop');
        $info = $shop -> where("id={$id}") -> find();
        $this -> assign('info', $info);
        $this -> assign('_title', '商品详情');
        $this -> display();
    }

    //购买商品
    public function buyGoods()
    {
        if (IS_POST) {
            $key     = I('money');
            $goodsId = I('gid');
            $key = I('key');
            //比对key
            if($key != $this->key){
                $info = array(
                    'code'=>0,
                    'msg'=>'参数错误!'
                );
                $this->ajaxReturn($info);
            }

            $uid     = $_COOKIE['qiyun_user'];
            //TODO:微信支付
            if (1) {//支付成功
                $res = $this -> addGoodsLog($goodsId, $uid);
                $info = array(
                    'code'=>1,
                    'msg'=>'交易成功'
                );
            } else {
                $info = array(
                    'code'=>0,
                    'msg'=>'交易失败'
                );
            }
            $this->ajaxReturn($info);
        }
    }

    //添加商品记录
    protected function addGoodsLog($shopId, $uid)
    {
        $model               = M('goods_log');
        $data['shop_id']     = $shopId;
        $data['uid']         = $uid;
        $data['create_time'] = time();
        $res                 = $model -> add($data);
        return true;
    }

}
