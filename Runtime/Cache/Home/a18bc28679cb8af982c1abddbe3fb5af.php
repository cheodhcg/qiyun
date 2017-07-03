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
        <div class="wd-nac qa-nav text-center" style="padding-left: 0;">
            <a href="<?php echo U('Index/index');?>" <?php if($type == 0): ?>class="qa-a"<?php endif; ?>>推荐</a>
            <i <?php if($type == 0): ?>class="qa-i"<?php endif; ?>></i>
        </div>
        <?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="wd-nac qa-nav text-center">
                <a href="<?php echo U('Index/index',array('id'=>$v['id']));?>" <?php if($type == $v['id']): ?>class="qa-a"<?php endif; ?>><?php echo ($v["title"]); ?></a>
                <i <?php if($type == $v['id']): ?>class="qa-i"<?php endif; ?>></i>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--<div class=" qa-nav text-center fr">-->
            <!--<a href="##">-->
                <!--<img style="margin-left: 3px;" src="/qiyun/Public/Home/images/xx_03.png" alt="w" width="22">-->
            <!--</a>-->
        <!--</div>-->
    </div>
    <img class="qa-bg" src="/qiyun/Public/Home/images/qa_02.png" alt="i" width="100%">
</div>
<div class="qa-list ">
    <?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Index/questioninfo?id='.$v['id']);?>">
                <div class="qa-info oh container underline">
                    <div class="qa-i-tit col-xs-12  ">
                        <div class="col-xs-3 qa-i-header">
                            <img src="<?php echo ($v["face"]); ?>" alt="1" width="60">
                        </div>
                        <div class="col-xs-9 qa-i-introduce">
                            <div class="col-xs-6"><?php echo ($v["nickname"]); ?>（<?php echo ($v["position"]); ?>）</div>
                            <div class="col-xs-6"><?php echo ($v["company"]); ?></div>
                        </div>
                    </div>
                    <div class="col-xs-12  qa-i-txt" style="color: #585858">
                        <?php echo ($v['content']); ?>
                    </div>
                    <div class="col-xs-12  qa-answer">
                        <div class="col-xs-2 qa-i-da row">
                            <img src="/qiyun/Public/Home/images/qa_05.png" alt="1" width="25">
                        </div>
                        <div class="col-xs-6 qa-i-voice">
                            <div class="voice-txt">1元收听</div>
                        </div>
                    </div>
                    <div class="col-xs-12  qa-look">
                        <span class="fr"><img src="/qiyun/Public/Home/images/qa_09.png" alt="i" width="25"><i><?php echo ($v['questionlist']['num']); ?></i>人看过</span>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php else: ?>
        <div style="text-align: center;margin-top: 15%">
            <img src="/qiyun/images/暂无消息.png" alt="暂无消息">
            <p>暂时还没有内容哦~</p>
            <p>去其他地方看看吧</p>
        </div><?php endif; ?>

    <!--<div class="qa-adv">-->
        <!--<img src="/qiyun/Public/Home/images/qa_20.png" alt="i" width="100% ">-->
    <!--</div>-->

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
            height:$(".qa-bg").height()
        });
    };
    $(function () {

        $('.qa-nav i ').css({
            width:$('.qa-nav a:first-child').width() - 10
        });
        $('.qa-nav a').click(function () {
            $('.qa-nav i ').css({
                width:$(this).width() - 10
            });
            $('.qa-nav a').removeClass('qa-a');
            $(this).addClass('qa-a');
            $('.qa-nav i ').removeClass('qa-i');
            $(this).parent('.qa-nav').children('i').addClass('qa-i')
        })
    })
</script>
</body>
</html>