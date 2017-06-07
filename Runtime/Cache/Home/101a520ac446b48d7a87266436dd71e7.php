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
    </style>
</head>
<body style="">
<div class="my container oh">


    <div class="my_text">
        <p><span>
		<?php if($info['face']): ?><img src="<?php echo ($info['face']); ?>" alt="aa" width="100%">
		<?php else: ?>
		<img src="images/timg.jpg" alt="aa" width="100%"><?php endif; ?>
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
                关于企业知道
            </p>
        </a>
        <div class="option_border_box"></div>
    </li>
    <li class="user_option">
        <a href="<?php echo U('User/news');?>">
                <span class="option-icon">
                    <img src="images/m9.png" alt="aa" width="25">
                </span>
            <p class="option-text">
                系统动态
            </p>
        </a>
        <div class="option_border_box"></div>
    </li>
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

<div class="nav_h">
</div>
<?php  $url = $_SERVER['QUERY_STRING']; $arr = explode('/', $url); $str = $arr[2]; ?>
<div class="nav oh">
    <ul class="nav_ul">
        <a href="<?php echo U('Index/index?type=1');?>">
            <li align="center" <?php if(($str) == "Index"): ?>class="nav_a"<?php endif; ?>>
                <span>
                <?php if(($str) == "Index"): ?><img src="images/w_17.png" alt="aa" width="32" >
                <?php else: ?>
                <img src="images/w_1.png" alt="aa" width="32" ><?php endif; ?>
                </span>
                <span>问答</span>
            </li></a>
        <a href="<?php echo U('Lecture/index?type=2');?>" <?php if(($str) == "Lecture"): ?>class="nav_a"<?php endif; ?>>
            <li align="center" class="">
                <span>
                <?php if(($str) == "Lecture"): ?><img src="images/w_4.png" alt="aa" width="" >
                <?php else: ?>
                <img src="images/w_19.png" alt="aa" width="" ><?php endif; ?>
                </span>
                <span>学习</span>
            </li></a>
        <a href="<?php echo U('Shop/index?type=3');?>" <?php if(($str) == "Shop"): ?>class="nav_a"<?php endif; ?>>
            <li align="center">
                <span>
                <?php if(($str) == "Shop"): ?><img src="images/w_18.png" alt="aa" width="" >
                <?php else: ?>
                <img src="images/w_21.png" alt="aa" width="" ><?php endif; ?>
                </span>
                <span>服务</span>
            </li>
        </a>
        <a href="<?php echo U('Contact/index?type=4');?>" <?php if(($str) == "Contact"): ?>class="nav_a"<?php endif; ?>>
            <li align="center">
                <span>
                <?php if(($str) == "Contact"): ?><img src="images/w_30.png" alt="aa" width="" align="absmiddle">
                <?php else: ?>
                <img src="images/w_23.png" alt="aa" width="" align="absmiddle"><?php endif; ?>
                </span>
                <span>人脉</span>
            </li></a>
        <a href="<?php echo U('User/index?type=5');?>" <?php if(($str) == "User"): ?>class="nav_a"<?php endif; ?>>
            <li align="center">
                <span>
                    <?php if(($str) == "User"): ?><img src="images/w_26.png" alt="aa" width="" >
                    <?php else: ?>
                    <img src="images/w_25.png" alt="aa" width="" ><?php endif; ?>
                </span><span>我的</span>
            </li>
        </a>
    </ul>
</div>
</body>
</html>

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