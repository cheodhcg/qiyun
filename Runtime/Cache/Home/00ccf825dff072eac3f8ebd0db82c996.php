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
<body>
<div class=" ">
    <img src="/qiyun/Public/Home/images/td_02.png" alt="w" width="100%" height="180">
</div>
<div class="td-blurb  container">

    <div class=" td-info-p ">
        <p><?php echo ($info["username"]); ?></p>
        <p><?php echo ($info["area"]); ?>-<?php echo ($info["company"]); ?>-（<?php echo ($info["position"]); ?>）</p>
    </div>
</div>
<hr class="underline-e">
<div class="container td-introduce">
    <div class="td-introduce-tit   col-lg-12 underline-c">
        <img src="/qiyun/Public/Home/images/td_09.png" alt="t" width="20">
        简介
    </div>
    <div class="td-introduce-txt">
        <p>最近遇到代缴社保的问题，心中一直不明白要怎么办。想来问问大家，希望大家能给我一个答案！
            最近遇到代缴社保的问题，心中一直不明白要怎么办。想来问问大家，希望大家能给我一个答案！
            最近遇到代缴社保的问题，心中一直不明白要怎么办。想来问问大家，希望大家能给我一个答案！</p>

    </div>
</div>


<div class="f">
</div>
<div class="nav oh">
    <ul class="nav_ul">
        <a href="<?php echo U('Index/index?type=1');?>">
            <li align="center" <?php if($class == 1): ?>class="nav_a"<?php endif; ?>>
            <span>
                <?php if($class == 1): ?><img src="/qiyun/Public/Home/images/w_31_1.png" alt="aa" width="32" >
                    <?php else: ?>
                    <img src="/qiyun/Public/Home/images/w_31.png" alt="aa" width="32" ><?php endif; ?>

                </span>
                <span>问答</span>
            </li></a>
        <a href="<?php echo U('Lecture/index?type=2');?>" >
            <li align="center" <?php if($class == 2): ?>class="nav_a"<?php endif; ?>>
                <span>
                    <?php if($class == 2): ?><img src="/qiyun/Public/Home/images/w_19_1.png" alt="aa" width="32" >
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_19.png" alt="aa" width="32" ><?php endif; ?>
                </span>
                <span>微讲座</span>
            </li></a>
        <a href="<?php echo U('Shop/index?type=3');?>">
            <li align="center" <?php if($class == 3): ?>class="nav_a"<?php endif; ?>>
                <span>
                    <?php if($class == 3): ?><img src="/qiyun/Public/Home/images/w_21_1.png" alt="aa" width="32" >
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_21.png" alt="aa" width="32" ><?php endif; ?>
                </span>
                <span>商城</span>
            </li>
        </a>
        <a href="<?php echo U('Contact/index?type=4');?>" >
            <li align="center" <?php if($class == 4): ?>class="nav_a"<?php endif; ?>>
                <span>
                    <?php if($class == 4): ?><img src="/qiyun/Public/Home/images/w_23_1.png" alt="aa" width="32" align="absmiddle">
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_23.png" alt="aa" width="32" align="absmiddle"><?php endif; ?>

                </span>
                <span>人脉圈</span>
            </li></a>
        <a href="<?php echo U('User/index?type=5');?>" >
            <li align="center" <?php if($class == 5): ?>class="nav_a"<?php endif; ?>>
                <span>
                    <?php if($class == 5): ?><img src="/qiyun/Public/Home/images/w_25_1.png" alt="aa" width="32" >
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_25.png" alt="aa" width="32" ><?php endif; ?>

                </span><span>我的</span>
            </li>
        </a>
    </ul>
</div>
<script src="/qiyun/Public/Home/js/jquery-1.9.1.min.js"></script>
<script src="/qiyun/Public/Home/js/bootstrap.min.js"></script>
<script src="/qiyun/Public/Home/js/swiper.min.js"></script>
</body>
</html>