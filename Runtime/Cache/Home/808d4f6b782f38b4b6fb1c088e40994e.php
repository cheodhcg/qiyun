<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>提现</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
</head>
<body style="">
<div class="container oh tx_box" style="height: 100%">
<form action="" method="post" id="form1">
        <div class="yue_info">
            <p>当前余额</p>
            <p align="center"><img src="images/tx_03.png" alt="aa" width="100%"></p>
            <p align="center"><span id="user_money"><?php echo ($user_money); ?></span>元</p>
        </div>
    <div class="yue_input">
        <input type="text" id="tx_money" name="tx_money" placeholder="请输入您要提现的金额">
        <p>提示：提现金额到您的微信账户 <span id="qb">全额提现</span></p>
    </div>
    <div>
        <a href="javascript:void(0);" class="yue_btn" id="tx">确认提现</a>
    </div>
</form>
</div>
<script src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$("#qb").click(function(event) {
    var user_money = $("#user_money").text();
    $("#tx_money").val(user_money);
});

$("#tx").click(function(event) {
    if($("#tx_money").val() < 1){
        alert('提现金额必须要大于一元');return false;
    }
    $("#form1").submit();
});
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