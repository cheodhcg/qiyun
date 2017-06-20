<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>我的关注</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
</head>
<style>

    .header-img{
        width: 40px;
        border-radius: 50px;
    }
    .header-img img{
        border-radius: 50px;
    }
    .follow-list{

    }
    .introduce {
        margin-left: 5px;
    }
    .introduce p:first-child{
        color: #e71f19;
    }
    .introduce p:last-child span{
        display: block;
        float: left;
        border-left:1px solid #999;
        color: #999;
        font-size: 12px;
        text-align: center;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp:1;
        -webkit-box-orient: vertical;
    }
    .introduce p:last-child span:first-child{
        border:none;
        text-align: left;
    }
    .cancel {
        width: 55px;
        text-align: center;
        line-height: 20px;
        border: 1px solid #0076c2;

        border-radius: 5px;
        font-size: 12px;
        margin-top: 15px;
    }
    .cancel a{
        color: #0076c2;
    }
    .follow-info{
        width: 94%;
        padding: 5px 3%;
        border-bottom:1px solid #ccc;
        height: 50px;

    }
</style>
<body style="background: #fff">
<div class="follow">
    <div class="follow-list">
        <div class="follow-info">
            <div class="header-img fl">
                <img src="images/sc01.png" alt="i" width="100%">
            </div>
            <div class="introduce fl">
                <p>
                    张山
                </p>
                <p>
                    <span>四川成都</span><span>xx公司</span><span>项目经理</span>
                </p>
            </div>
            <div class="cancel fr">
                <a href="##">取消关注</a>
            </div>
        </div>
    </div>
</div>
<script src="../jquery-1.9.1.min.js"></script>
<script>
    $(function () {
        var w = $(window).width();
        $('.introduce').css({
            width:w - ($('.header-img').width()) - ($('.cancel').width()) - 30
        });
        $('.introduce p:last-child span').css({
            width:$('.introduce').width() / 3 -3
        })
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