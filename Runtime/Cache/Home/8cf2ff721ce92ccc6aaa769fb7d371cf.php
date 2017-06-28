<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>会员主页</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
    <!--<link rel="stylesheet" href="../style.css">-->
    <style>
        .my{
            background: url("/qiyun/images/bg_03.png");
            background-size: 100%;
        }
        .my_text p:first-child span{
            position: relative;
        }
        .my_text p:first-child .zj{
            position: absolute;
            right: 5px;
            bottom: 2px;
            border:none;
        }
    </style>
</head>
<body style="">
<div class="my container oh">


    <div class="my_text">
        <p><span>
		<?php if($info['face']): ?><img src="<?php echo ($info['face']); ?>" alt="aa" width="100%">
		<?php else: ?>
		<img src="images/timg.jpg" alt="aa" width="100%"><?php endif; ?>
            <img class="zj" src="/qiyun/images/zj.png" alt="i" width="15px">
		</span></p>
        <p><strong><?php echo ($info['nickname']); ?></strong></p>
    </div>
</div>
<ul class="ul_option">
    <li class="user_option">
        <a href="<?php echo U('User/myQuestion');?>">
                <span class="option-icon">
                    <img src="images/m.png" alt="aa" width="25">
                </span>
            <p class="option-text">
                我的提问
            </p>
        </a>
        <div class="option_border_box"></div>
    </li>
    <li class="user_option">
        <a href="<?php echo U('User/myAnswer');?>">
                <span class="option-icon">
                    <img src="images/m2.png" alt="aa" width="25">
                </span>
            <p class="option-text">
                我的回答
            </p>
        </a>
        <div class="option_border_box"></div>
    </li>
    <li class="user_option">
        <a href="<?php echo U('User/myheard');?>">
                <span class="option-icon">
                    <img src="images/m3.png" alt="aa" width="25">
                </span>
            <p class="option-text">
                我听过的
            </p>
        </a>
        <div class="option_border_box"></div>
    </li>
    <li class="user_option">
        <a href="<?php echo U('User/myLecture');?>">
                <span class="option-icon">
                    <img src="images/m4.png" alt="aa" width="25">
                </span>
            <p class="option-text">
                我的讲座
            </p>
        </a>
        <div class="option_border_box"></div>
    </li>
    <li class="user_option">
        <a href="<?php echo U('User/myFollow');?>">
                <span class="option-icon">
                    <img src="images/关注.png" alt="aa" width="25">
                </span>
            <p class="option-text">
                我的关注
            </p>
        </a>
        <div class="option_border_box"></div>
    </li>
    <li class="user_option">
        <a href="<?php echo U('User/myMoney');?>">
                <span class="option-icon">
                    <img src="images/m5.png" alt="aa" width="25">
                </span>
            <p class="option-text">
                我的账户
            </p>
        </a>
        <div class="option_border_box"></div>
    </li>
    <li class="user_option">
        <a href="<?php echo U('User/myAuthentication');?>">
                <span class="option-icon">
                    <img src="images/m6.png" alt="aa" width="25">
                </span>
            <p class="option-text">
                申请会员
            </p>
        </a>
        <div class="option_border_box"></div>
    </li>
    <li class="user_option">
        <a href="<?php echo U('User/mySms');?>">
                <span class="option-icon">
                    <img src="images/m7.png" alt="aa" width="25">
                </span>
            <p class="option-text">
                我的通知
            </p>
        </a>
        <div class="option_border_box"></div>
    </li>
    <li class="user_option">
        <a href="<?php echo U('User/about');?>">
                <span class="option-icon">
                    <img src="images/m8.png" alt="aa" width="25">
                </span>
            <p class="option-text">
                关于企知道
            </p>
        </a>
        <div class="option_border_box"></div>
    </li>
<!--    <li class="user_option">
        <a href="<?php echo U('User/news');?>">
                <span class="option-icon">
                    <img src="images/m9.png" alt="aa" width="25">
                </span>
            <p class="option-text">
                系统动态
            </p>
        </a>
        <div class="option_border_box"></div>
    </li>-->
    <li class="user_option">
        <a href="<?php echo U('User/myinfo');?>">
                <span class="option-icon">
                    <img src="images/m10.png" alt="aa" width="25">
                </span>
            <p class="option-text">
                我的信息
            </p>
        </a>
        <div class="option_border_box"></div>
    </li>
</ul>
<!--<a href="<?php echo U('user/phpinfo');?>">phpinfo</a>-->

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

<script src="js/jquery-1.9.1.min.js"></script>
<script>
    //    $(function () {
    //        var w = $('.my_fl_ul li p:first-child').width();
    //        var q = $('.my_fl_ul li p:last-child').width();
    //        console.log(w,q);
    //        $('.my_fl_ul li').css({
    //            height:w + q
    //        })
    //    })
</script>ooter"/>

<script src="js/jquery-1.9.1.min.js"></script>
<script>
    //    $(function () {
    //        var w = $('.my_fl_ul li p:first-child').width();
    //        var q = $('.my_fl_ul li p:last-child').width();
    //        console.log(w,q);
    //        $('.my_fl_ul li').css({
    //            height:w + q
    //        })
    //    })
</script>