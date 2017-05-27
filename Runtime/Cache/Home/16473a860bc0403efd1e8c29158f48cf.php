<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>人脉圈</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <script type="text/javascript" src="js/swiper.min.js"></script>
    <!--<link rel="stylesheet" href="../style.css">-->
</head>
<body>
<div class="rmq_title oh">
    <ul class="rmq_t_ul">
        <li><a href="<?php echo U('Contact/index');?>" class="rmq_a" >人脉圈</a></li>
        <li><a href="<?php echo U('Contact/news');?>">信息交流</a></li>
        <li><a href="<?php echo U('Contact/release_news');?>">信息发布</a></li>
        <a href="搜索.html" class="search_r">

                <img src="images/search.png" alt="aa" width="100%">


        </a>
    </ul>
    <div class="rmq_list container oh" align="center">
        <ul>
        <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('index?cate_id='.$v['id']);?>" <?php if(($v['id']) == $cate_id): ?>class="rmq_a2"<?php endif; ?>><?php echo ($v['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        
    </div>
</div>
<div class="rmq_info">
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="rmq_person oh ">
        <div class="rmq-title">
            <div class="fl rmq_q_img">
                <img src="<?php echo ($vo['face']); ?>" alt="aa" width="100%">
            </div>
            <div class="fl rmq_i">
                <p><?php echo ($vo['username']); ?>
                    <?php if(($vo['status']) == "0"): ?><span class="fr rmq_span1 db">关注</span>
                    <span class="fr rmq_span2 dn">已关注</span>
                    <?php else: ?>
                    <span class="fr rmq_span1 db">关注</span>
                    <span class="fr rmq_span2 dn">已关注</span><?php endif; ?>
                </p>
                <p><?php echo ($vo['area']); ?> | <?php echo ($vo['company']); ?> | <?php echo ($vo['position']); ?></p>
            </div>
        </div>

            <div class="rmq_p_text">
                <p><?php echo ($vo['content']); ?></p>
            </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>    
</div>
<script src="js/jquery-1.9.1.min.js"></script>
<script>
$(function () {
    var a = $('.rmq_t_ul li').width();
    $('.rmq_t_ul').css({
        width:a * 3 +40
    });
//    $('.rmq_list ul').css({
//        width:a * 3 +40
//    });
})
</script>

<div class="nav_h">
</div>
<?php  $url = $_SERVER['QUERY_STRING']; $arr = explode('/', $url); $str = $arr[2]; ?>
<div class="nav oh">
    <ul class="nav_ul">
        <a href="<?php echo U('Index/index?type=1');?>">
            <li align="center" <?php if(($str) == "Index"): ?>class="nav_a"<?php endif; ?>>
                <span>
                <?php if(($str) == "Index"): ?><img src="images/w_17.png" alt="aa" width="" >
                <?php else: ?>
                <img src="images/w_1.png" alt="aa" width="" ><?php endif; ?>
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
                <span>微讲座</span>
            </li></a>
        <a href="<?php echo U('Shop/index?type=3');?>" <?php if(($str) == "Shop"): ?>class="nav_a"<?php endif; ?>>
            <li align="center">
                <span>
                <?php if(($str) == "Shop"): ?><img src="images/w_18.png" alt="aa" width="" >
                <?php else: ?>
                <img src="images/w_21.png" alt="aa" width="" ><?php endif; ?>
                </span>
                <span>商城</span>
            </li>
        </a>
        <a href="<?php echo U('Contact/index?type=4');?>" <?php if(($str) == "Contact"): ?>class="nav_a"<?php endif; ?>>
            <li align="center">
                <span>
                <?php if(($str) == "Contact"): ?><img src="images/w_30.png" alt="aa" width="" align="absmiddle">
                <?php else: ?>
                <img src="images/w_23.png" alt="aa" width="" align="absmiddle"><?php endif; ?>
                </span>
                <span>人脉圈</span>
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