<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>我的名片</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
</head>
<body style="background: #fff">
<div class="my_card container" style="height: 110%">
    <!--<div class="my_card_info oh">-->
        <!--<div class="my_head fl">-->
            <!--<img src="images/w_07.png" alt= " aa" width="100%" align="absmiddle">-->
        <!--</div>-->
        <!--<div class="my_card_text fl">-->
            <!--<p>张晓磊</p>-->
            <!--<p>联系电话：<span>12345678910</span></p>-->
            <!--<p>成都腾讯有限公司 | 项目经理</p>-->
        <!--</div>-->
     <!---->
    <!--</div>-->
    <div class="user_text ">
        <div class="user_t_p">
        <div class="card_one">
            <img src="<?php echo ($info['face']); ?>" alt="aa" width="100%" style="border-radius: 25px">
        </div>
        <div   class="card_two">
            <p><?php echo ($info['username']); ?></p>
            <p><?php echo ($info['position']); ?></p>
        </div>
        <div class="card_three">
            <p>TEL <span><?php echo ($info['phone']); ?></span></p>
            <p><?php echo ($info['company']); ?></p>
        </div>
        </div>
        <p><img src="images/yh_05.png" alt="aa" width="100%"></p>
    </div>
	<form action="" method="post" enctype="multipart/form-data" id="form1">
    <div class="my_card_input">
        <p><span>姓名</span><input type="text" name="username" value="<?php echo ($info['username']); ?>"></p>
        <p><span>公司</span><input type="text" name="company" value="<?php echo ($info['company']); ?>"></p>
        <p><span>职业</span><input type="text" name="position" value="<?php echo ($info['position']); ?>"></p>
        <p><span>电话</span><input type="text" name="phone" value="<?php echo ($info['phone']); ?>"></p>
        <p><input type="checkbox" id="my_card_c" <?php if(($info['is_zs']) == "1"): ?>checked<?php endif; ?>>        <label for="my_card_c">是否展示名片</label>
        </p>
    </div>
    <div style="">
        <a href="##" class="yue_btn">提交</a>
    </div>
	</form>
</div>
<!--     <div style="width: 100%;height: 20px;">
        
    </div> -->
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
	$(".yue_btn").click(function(event){
		$('#form1').submit();
	});
    $(function () {
        w()
    });
    function w() {
        var w = $(window).width();
        if(w > 768){
            $('.user_t_p').css({
                height:w * 0.3
            })
        }else{
            $('.user_t_p').css({
                height:w * 0.57
            })
        }
    }
    $(window).resize(function(){
        w ()
    });
</script>