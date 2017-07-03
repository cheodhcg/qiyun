<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title><?php echo ($_title); ?></title>
<link rel="stylesheet" href="/qiyun/Public/Home/css/style.css">
<link rel="stylesheet" href="/qiyun/Public/Home/css/common.css">
<link rel="stylesheet" href="/qiyun/Public/Home/css/bootstrap.min.css">
</head>
<body style="background: #eef3f9">
<div class="mine-header">
    <div class="mine-h-box container">
        <div class="apply-vip fr text-center">
            <a href="<?php echo U('User/myAuthentication');?>">申请会员</a>
            <!--<a href="<?php echo U('WxJsApi/applyMember');?>">申请会员</a>-->
        </div>
        <div class="mine-h-img text-center">
            <div class="mine-t">
                <img class="mine-head" src="<?php echo ($info['face']); ?>" alt="i" width="60" height="60">

                <?php if($info.level): ?><img class="mine-v" src="/qiyun/Public/Home/images/m2_03.png" alt="1" width="18"><?php endif; ?>

            </div>

        </div>
        <div class="text-center mine-name">
            <a href="##"><?php echo ($info['nickname']); ?></a>
        </div>
    </div>
</div>
<div class="one">
    <ul>
        <li>
            <a href="<?php echo U('User/myQuestion');?>">
                <img src="/qiyun/Public/Home/images/my_07.png" alt="i" width="50">
                <br>
                <span>  我的提问</span>
            </a>
        </li>
        <li>
            <a href="<?php echo U('User/myAnswer');?>">
                <img src="/qiyun/Public/Home/images/my_09.png" alt="i" width="50">
                <br>
                <span>  我的回答</span>
            </a>
        </li>
        <li>
            <a href="<?php echo U('User/myheard');?>">
                <img src="/qiyun/Public/Home/images/my_11.png" alt="i" width="50">
                <br>
                <span>  我听过的</span>
            </a>
        </li>
        <li>
            <a href="<?php echo U('User/myLecture');?>">
                <img src="/qiyun/Public/Home/images/my_16.png" alt="i" width="50">
                <br>
                <span>  我的讲座</span>
            </a>
        </li>
        <li>
            <a href="<?php echo U('User/myMoney');?>">
                <img src="/qiyun/Public/Home/images/my_17.png" alt="i" width="50">
                <br>
                <span> 我的账户</span>
            </a>
        </li>
        <li>
            <a href="<?php echo U('User/apply');?>">
                <img src="/qiyun/Public/Home/images/my_19.png" alt="i" width="50">
                <br>
                <span>  专家认证</span>
            </a>
        </li>
    </ul>
</div>
<div class="mine-info container">
    <div class="mine-list">
        <div class="m-icon m-icon1  col-xs-1"></div>
        <div class="m-txt col-xs-10 underline-c"><a href="<?php echo U('User/mySms');?>">我的通知</a></div>
    </div>
    <div class="mine-list">
        <div class="m-icon m-icon2  col-xs-1"></div>
        <div class="m-txt col-xs-10 underline-c"><a href="<?php echo U('User/about');?>">关于企业知道</a></div>
    </div>
    <div class="mine-list">
        <div class="m-icon m-icon3  col-xs-1"></div>
        <div class="m-txt col-xs-10 underline-c"><a href="##">系统动态</a></div>
    </div>
    <div class="mine-list">
        <div class="m-icon m-icon4  col-xs-1"></div>
        <div class="m-txt col-xs-10 underline-c"><a href="<?php echo U('User/myinfo');?>">我的信息</a></div>
    </div>
</div>
<div class="f">
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

</body>
</html>