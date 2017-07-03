<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>会员申请</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
    <style>
        .vip_btn2{
    width: 180px;
    height: 35px;
    /*background: #dd5044;*/
    text-align: center;
    line-height: 35px;
    color: #fff;
    font-size: 16px;
    margin: 40px auto 0 auto;
    display: block;
    border-radius: 5px;
}
    </style>
</head>
<body style="">
<div class="my_vip container oh" style="height: 100%">
    <p><?php echo C('VIP_CONTENT');?></p>
    <div>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i; if(($m[type]) == "0"): ?><a href="<?php echo U('WxJsApi/applyMember?id='.$m[id]);?>" <?php if(($level) == "1"): ?>class="vip_btn2" <?php else: ?> class="vip_btn"<?php endif; ?>>
                成为<?php echo ($m["title"]); ?>(<?php echo ($m["money"]); ?>/一年)
                </a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        <!--<a href="<?php echo U('WxJsApi/applyMember?id=1');?>" <?php if(($level) == "1"): ?>class="vip_btn2" <?php else: ?> class="vip_btn"<?php endif; ?>>-->
        <!--成为会员(99/一年)</a>-->
        <!--<a href="<?php echo U('WxJsApi/applyMember?id=2');?>" <?php if(($level) == "2"): ?>class="vip_btn2" <?php else: ?> class="vip_btn"<?php endif; ?>>-->
        <!--成为VIP会员(199/一年)</a>-->
        <a href="<?php echo U('User/invitation');?>" <?php if(($level) == "0"): ?>class="vip_btn2" <?php else: ?> class="vip_btn"<?php endif; ?>>
        输入邀请码</a>
    </div>
</div>

<div class="nav oh">
    <ul class="nav_ul">
        <a href="<?php echo U('Index/index?type=1');?>">
            <li align="center" <?php if($class == 1): ?>class="nav_a"<?php endif; ?>>
            <span>
                <?php if($class == 1): ?><img src="/qiyun/Public/Home/images/w_31_1.png" alt="aa" width="" >
                    <?php else: ?>
                    <img src="/qiyun/Public/Home/images/w_31.png" alt="aa" width="" ><?php endif; ?>

                </span>
            <span>问答</span>
            </li></a>
        <a href="<?php echo U('Lecture/index?type=2');?>" >
            <li align="center" <?php if($class == 2): ?>class="nav_a"<?php endif; ?>>
            <span>
                    <?php if($class == 2): ?><img src="/qiyun/Public/Home/images/w_19_1.png" alt="aa" width="" >
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_19.png" alt="aa" width="" ><?php endif; ?>
                </span>
            <span>微讲座</span>
            </li></a>
        <a href="<?php echo U('Shop/index?type=3');?>">
            <li align="center" <?php if($class == 3): ?>class="nav_a"<?php endif; ?>>
            <span>
                    <?php if($class == 3): ?><img src="/qiyun/Public/Home/images/w_21_1.png" alt="aa" width="" >
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_21.png" alt="aa" width="" ><?php endif; ?>
                </span>
            <span>商城</span>
            </li>
        </a>
        <a href="<?php echo U('Contact/index?type=4');?>" >
            <li align="center" <?php if($class == 4): ?>class="nav_a"<?php endif; ?>>
            <span>
                    <?php if($class == 4): ?><img src="/qiyun/Public/Home/images/w_23_1.png" alt="aa" width="" align="absmiddle">
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_23.png" alt="aa" width="" align="absmiddle"><?php endif; ?>

                </span>
            <span>人脉圈</span>
            </li></a>
        <a href="<?php echo U('User/index?type=5');?>" >
            <li align="center" <?php if($class == 5): ?>class="nav_a"<?php endif; ?>>
            <span>
                    <?php if($class == 5): ?><img src="/qiyun/Public/Home/images/w_25_1.png" alt="aa" width="" >
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_25.png" alt="aa" width="" ><?php endif; ?>

                </span><span>我的</span>
            </li>
        </a>
    </ul>
</div>
<script src="/qiyun/Public/Home/js/jquery-1.9.1.min.js"></script>
<script src="/qiyun/Public/Home/js/bootstrap.min.js"></script>