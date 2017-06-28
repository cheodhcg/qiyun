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
<div class="container single-video-tit">
    <p>王小利</p>
    <p>六月的欧洲为何青草空袭</p>
</div>
<div class="single-video underline-e2">
    <img src="/qiyun/Public/Home/images/td_02.png" alt="w" width="100%">
    <a href="##"><img src="/qiyun/Public/Home/images/sp_03.png" alt="w" width="60"></a>
</div>

<div class="container single-video-profile">
    <div class="col-lg-12 row single-video-profile-tit">
        六月的欧洲为何青草空袭？
    </div>
    <p>1、六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭</p>
    <p>2、六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭</p>
    <p>3、六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭</p>

    <div class="single-video-f">
        六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭六月的欧洲为何青草空袭
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
<script>
    $(function () {
        $('.single-video a').css({
            top:($('.single-video img').height() - 60 ) / 2,
            left:($('.single-video').width() - 60 ) / 2
        })
    })
</script>
</body>
</html>