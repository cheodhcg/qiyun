<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>信息发布</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
    <style>
        .xxfb_title select{
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-left: 5px;
            /*margin-top: 2px;*/
            height: 30px;
            /* width: 70px; */
            text-align: center;
            letter-spacing: 8px;
            background: #fff;
        }
    </style>
    <link rel="stylesheet" href="../style1.css">
    <link rel="stylesheet" href="../style2.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
<div class="rmq_title oh">
    <ul class="rmq_t_ul">
        <li><a href="<?php echo U('Contact/index');?>">人脉圈</a></li>
        <li><a href="<?php echo U('Contact/news');?>">信息交流</a></li>
        <li><a href="<?php echo U('Contact/release_news');?>" class="rmq_a">信息发布</a></li>
    </ul>

</div>
<div class="container oh xxfb_box">
<form action="" method="post" enctype="multipart/form-data" id="form1">
    <div class="xxfb_title " style="height: 30px;width:100%;float:left;">
        <span class="fl r_span">资讯标题</span>
        <input style="" type="text" name="title" id="title" placeholder="请填写资讯标题">
    </div>
    <div class="xxfb_title " style="margin-top: 15px; height: 30px;width:100%;float:left;">
        <span class="fl r_span">资讯分类</span>
        <select name="cid" >
            <?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v['id']); ?>"><?php echo ($v['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <div class="xxfb_cont" style="width:100%;float:left;">
        <span class="fl r_span2" style="margin-right:5px;">资讯图片</span>
        <span class="">
             <!--<img src="images/sc_07.png" alt=" aa" width="100%"><input type="file" class="dn" id="fileTne" name="icon" style=""> -->
            <!--<label for="fileTne"><img style="margin-top: 1px" class="fl"  src="images/sc_07.png" alt="aa" width="70%" ></label>-->
            <input type="file" class="" id="fileTne" name="icon" style="width:70%;display: none;">
            <label for="fileTne"><img src="images/add.jpg" alt=""></label>
        </span>
    </div>
    <div class="xxfb_cont" style="width:100%;float:left; height: 100px;margin-bottom: 50px;">
        <span class="fl r_span2">咨询内容</span>
        <textarea style="padding: 5px;margin-top: 1px" name="content" class="fl" id="content" placeholder="请填写资讯内容"></textarea>
    </div>
    <br>
    <input class="xxfb_btn" type="button" id="tijiao" style="width: 100%;" value="提交">
</form>
</div>
<script src="js/jquery-1.9.1.min.js"></script>
<script>
$("#tijiao").click(function(event) {
    if($("#title").val() == ""){
        alert('请填写资讯标题');return false;
    }
    
    if(jQuery("input[type='file']").val()==""){
        alert('请上传图片');return false;
    }

    if($("#content").val() == ""){
        alert('请填写资讯内容');return false;
    }
    $("#form1").submit();
});
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