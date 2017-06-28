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
        <p><input type="checkbox" id="my_card_c" name="is_zs" value="1" <?php if(($info['is_zs']) == "1"): ?>checked<?php endif; ?>>        <label for="my_card_c">是否展示名片</label>
        </p>
    </div>
    <div style="">
        <a href="##" class="yue_btn">提交</a>
    </div>
	</form>
</div>
<!--     <div style="width: 100%;height: 20px;">
        
    </div> -->
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