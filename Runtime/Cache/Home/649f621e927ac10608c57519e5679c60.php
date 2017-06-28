<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>我的账户</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
</head>
<body style="">
<div class="my_money oh container">
    <div class="money_box ">
        <p>余额<a  href="<?php echo U('User/invitationList');?>" class="fr">邀请券</a></p>
        <p><?php echo ($info['user_money']); ?> <span>元</span>   </p>
        <p><a href="<?php echo U('User/cash');?>">提现</a></p>
    </div>

    <div class="sy_info oh">
        <!-- <div class="sy_sum">：￥<span><?php echo ($info['total_money']); ?></span></div> -->
        <div class="sy_fl">
            <span>总收益：
                <strong>￥<?php echo ($info['total_money']); ?></strong>
            </span>
            <span>
                今日收入：
                <strong>￥<?php echo ($total_money); ?></strong>
            </span>
        </div>
    </div>

</div>
<hr>
<div class="sy_time container oh">
    <div><img src="images/rl_03.png" alt=" aa" > <span>交易记录</span></div>
    <?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p class="underline">
        <span><?php echo ($v['type']); ?></span>
        <span>+<?php echo ($v['money']); ?></span>
        <span><?php echo (date('Y-m-d H:i',$v['addtime'])); ?></span>
    </p><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php else: ?>
        <p class="underline">暂无分成记录! </p><?php endif; ?>
</div>
<div class="f">
</div>
<div class="nav oh">
    <ul class="nav_ul">
        <a href="<?php echo U('Index/index?type=1');?>">
            <li align="center" class="" >
            <span>
                <img src="/qiyun/Public/Home/images/w_31.png" alt="aa" width="32" >
                </span>
                <span>问答</span>
            </li></a>
        <a href="<?php echo U('Lecture/index?type=2');?>" >
            <li align="center" class="">
                <span>

                <img src="/qiyun/Public/Home/images/w_19.png" alt="aa" width="" >

                </span>
                <span>微讲座</span>
            </li></a>
        <a href="<?php echo U('Shop/index?type=3');?>">
            <li align="center" class="nav_a">
                <span>
                <img src="/qiyun/Public/Home/images/w_21_1.png" alt="aa" width="" >
                </span>
                <span>商城</span>
            </li>
        </a>
        <a href="<?php echo U('Contact/index?type=4');?>" >
            <li align="center">
                <span>

                <img src="/qiyun/Public/Home/images/w_23.png" alt="aa" width="" align="absmiddle">

                </span>
                <span>人脉圈</span>
            </li></a>
        <a href="<?php echo U('User/index?type=5');?>" >
            <li align="center">
                <span>

                    <img src="/qiyun/Public/Home/images/w_25.png" alt="aa" width="" >

                </span><span>我的</span>
            </li>
        </a>
    </ul>
</div>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/swiper.min.js"></script>