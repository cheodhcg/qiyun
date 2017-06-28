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
<div class=" qa-header ">
    <div class="container-fluid qa-box">
        <div class=" qa-nav text-center jz-nav" style="padding-left: 0;">
            <a class="qa-a" href="<?php echo U('Lecture/index');?>" <?php if($type == 0): ?>class="qa-a"<?php endif; ?>>推荐</a>
            <i <?php if($type == 0): ?>class="qa-i"<?php endif; ?>></i>
        </div>
        <?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class=" qa-nav text-center jz-nav">
                <a href="<?php echo U('Lecture/index',array('id'=>$v['id']));?>" <?php if($type == $v['id']): ?>class="qa-a"<?php endif; ?>><?php echo ($v["title"]); ?></a>
                <i <?php if($type == $v['id']): ?>class="qa-i"<?php endif; ?>></i>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>


        <div class=" qa-nav text-center jz-nav1 fr">
            <a href="##">
                <img src="/qiyun/Public/Home/images/xx_03.png" alt="w" width="22">
            </a>
        </div>
    </div>
    <img class="jz-bg" src="/qiyun/Public/Home/images/mi_02.png" alt="i" width="100%">
</div>

<div class="mi-list ">
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="mi-info container-fluid underline-c">
            <div class="col-xs-2  mi-header">
                <img src="/qiyun/Public/Home/images/qa_13.png" alt="i" width="60">
            </div>
            <div class="col-xs-10  mi-txt">
                <p>
                    <img src="/qiyun/Public/Home/images/mi_05.png" alt="i" width="20" height="">
                    <?php echo (msubstr($v['title'],0,15)); ?>
                </p>
                <p>
                    <?php echo (msubstr($v['content'],0,50)); ?>
                </p>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
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
<script>
    window.onload = function () {
        $('.qa-header').css({
            height:$('.jz-bg').height()
        })
    };
    $(function () {
        $('.qa-nav a').click(function () {
            $('.qa-nav a').removeClass('qa-a');
            $(this).addClass('qa-a');
            $('.qa-nav i ').removeClass('qa-i');
            $(this).parent('.qa-nav').children('i').addClass('qa-i')
        })
    })
</script>
</body>
</html>