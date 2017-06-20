<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>培训详情</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
    <style>
        .px-info3{
            background: #fff;
            width: 100%;
            padding: 5px 0 20px 0;
            overflow: hidden;
        }
        .px-info3 h3{
            line-height: 40px;
            width: 92%;
            padding: 0 4%;
            margin: 0 auto;
        }
        .px-info3 ul{
            width: 90%;
            margin: 0 auto;
        }
        .px-info3 ul li{
            line-height: 40px;
            border-bottom: 1px solid #ccc;
            width: 95%;
            padding-left: 5.5%;
            background: url("../images/cc.png") no-repeat left ;
            background-size: 15px;
        }

        .px-info4{
            background: #fff;
            width: 100%;
            padding: 5px 0 20px 0;
            overflow: hidden;
            border-top:10px solid #f6f6f6;
        }
        .px-info4 ul{

        }
        .px-info4 ul li{
            width: 92%;
            padding: 0 4%;
            line-height: 40px;
            border-bottom: 1px solid #ccc;
        }
        .px-info4 ul li span{
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="reward_page">
    <div class="reward-box">
        <span class="reward-exit" onclick="close_reward()">X</span>
        <div class="reard-title">
            选择金额
        </div>
        <ul>
            <li><a href="#" onclick="onBridgeReady()">5元</a></li>
            <li><a href="<?php echo U('Lecture/reward',array('id'=>$info['id']));?>" data-price="10">10元</a></li>
            <li><a href="<?php echo U('Lecture/reward',array('id'=>$info['id']));?>" data-price="20">20元</a></li>
            <li><a href="<?php echo U('Lecture/reward',array('id'=>$info['id']));?>" data-price="50">50元</a></li>
        </ul>
    </div>
</div>
<!--<div class="pop-text">-->
    <!--<div class="reward-box2">-->
        <!--<span class="reward-exit" onclick="close_text()">X</span>-->
        <!--<div class="content_text">-->
            <!--<h3 style="text-align: center">企知道学习规则和责任声明</h3>-->
            <!--<p>asdasdasdasdasdasdas</p>-->
            <!--<p>asdasdasdasdasdasdas</p>-->
            <!--<p>asdasdasdasdasdasdas</p>-->
        <!--</div>-->
    <!--</div>-->
<!--</div>-->
<!--<div class="pop-tips">-->
    <!--<span class="pop-exit" onclick="close_poptext()">X</span>-->
    <!--<p>学期之前请阅读<span class="text_lh" onclick="shop_text()">《企知道学习规则和责任声明》</span></p>-->

<!--</div>-->
<div class="banner_p">
    <img src="/qiyun<?php echo ($info['icon']); ?>" alt="aa" width="100%" height="100%">
</div>
<div class="px_info oh">
    <div class="zan_p container underline  oh">
        <div class="zan_p_l fl ">
            <span>
                <a href="javascript:void (0);" id="like" onclick="likeUp()">
                <img src="images/px_05.png" align="absmiddle" alt="aa" width="100%">
                </a>
            </span>
            <span>
                <?php if(($info['likeup']) == "0"): ?>还没有人点赞哦
                    <?php else: ?>
                    <?php echo ($info['likeup']); ?>人觉得很赞<?php endif; ?>

            </span>
        </div>
        <div class="zan_p_r fr">
            <!--<a href="<?php echo U('Lecture/reward',array('id'=>$info['id']));?>">-->
            <a href="javascript:void(0);" onclick="reward(<?php echo ($info["id"]); ?>)">
                <span id="reward_btn">
                    打赏
                </span>
            </a>
            <span><?php echo ($info['rewardnum']); ?>人</span>
        </div>
    </div>
</div>
<div class="px_info2 oh container" style="margin-bottom: 15px;">
    <!--<span style="float: right;color: red;font-weight: bold">￥<?php echo ($info["money"]); ?></span>-->
    <h3><?php echo ($info['title']); ?></h3>
    <p><?php echo ($info['content']); ?></p>
    <!--<a href="<?php echo U('User/info?uid='.$v['id']);?>">-->

        <!--<p><?php echo ($info['nickname']); ?>（<?php echo ($info['position']); ?>） | <?php echo ($info['area']); ?> <?php echo ($info['company']); ?></p>-->
        <!--<a href="<?php echo U('User/info?uid='.$v['id']);?>">-->
            <!--<img src="<?php echo ($info['face']); ?>" alt="aa" width="50" style="border-radius: 25px">-->
        <!--</a>-->
    <!--</a>-->
    <!--<img src="images/w_10.png" alt="aa" width="150" align="bottom" id="bofang">-->
</div>
<div class="px_info2 oh container" style="margin-bottom: 15px;">
    <!--<span style="float: right;color: red;font-weight: bold">￥<?php echo ($info["money"]); ?></span>-->
    <h3><?php echo ($info['title']); ?></h3>
    <p><?php echo ($info['content']); ?></p>
    <!--<a href="<?php echo U('User/info?uid='.$v['id']);?>">-->

        <!--<p><?php echo ($info['nickname']); ?>（<?php echo ($info['position']); ?>） | <?php echo ($info['area']); ?> <?php echo ($info['company']); ?></p>-->
        <!--<a href="<?php echo U('User/info?uid='.$v['id']);?>">-->
            <!--<img src="<?php echo ($info['face']); ?>" alt="aa" width="50" style="border-radius: 25px">-->
        <!--</a>-->
    <!--</a>-->
    <!--<img src="images/w_10.png" alt="aa" width="150" align="bottom" id="bofang">-->
</div>
<div class="px-info3">
    <h3 class="underline">讲单</h3>
    <ul>
        <li>水水水水水水水水水水水水水水</li>
        <li>sssssssssssss生生世世</li>
        <li>杀杀杀杀杀杀杀杀杀</li>
    </ul>
</div>
<div class="px-info4">
    <ul>
        <li><a href="##">《企知道学习规则和责任声明》 <span class="fr"> > </span> </a></li>
    </ul>
</div>
<script src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
    window.onload = function () {
        var bannerWinth = $(window).width();
        var bannerHeight = ($(window).height()) / 3;
        $('.banner_p').css({
            width:bannerWinth,
            height:bannerHeight
        })
    };
    var src = "<?php echo ($info['content_icon']); ?>";
    //用户点播放
    $("#bofang").click(function (event) {
        $("#bofang").attr('src', 'images/4.gif');
        playSound();
    });
    function reward() {
        var bh=$(window).height();//获取屏幕高度
        var bw=$(window).width();//获取屏幕宽度
        var top = $(window).scrollTop()
        $('.reward_page').css({
            height:bh,
            width:bw,
            top:top,
            display:"block"
        });
        $('.reward_page').show();
        $('html,body').addClass('ovfHiden'); //使网页不可滚动
//        $('.reward_page').fadeToggle(0);
    }
    function shop_text() {
        var bh=$(window).height();//获取屏幕高度
        var bw=$(window).width();//获取屏幕宽度
        var top = $(window).scrollTop()
        $('.pop-text').css({
            height:bh,
            width:bw,
            top:top,
            display:"block"
        });
        $('.pop-text').show();
        $('html,body').addClass('ovfHiden'); //使网页不可滚动
    }
    function close_poptext() {
        $('.pop-tips').hide();
    }
    function close_text() {
        $('html,body').removeClass('ovfHiden'); //使网页恢复可滚
        $('.pop-text').hide();
    }
/*    $(".reward_page:not('.reward_box')").click(function () {
        close_reward();
    });*/
    function close_reward() {
        $('html,body').removeClass('ovfHiden'); //使网页恢复可滚
        $('.reward_page').hide();
    }


    function playSound() {
        var borswer = window.navigator.userAgent.toLowerCase();
        if (borswer.indexOf("ie") >= 0) {
            //IE内核浏览器
            var strEmbed = '<embed name="embedPlay" src="' + src + '" autostart="true" hidden="true" loop="false"></embed>';
            if ($("body").find("embed").length <= 0)
                $("body").append(strEmbed);
            var embed = document.embedPlay;

            //浏览器不支持 audion，则使用 embed 播放
            embed.volume = 100;
            //embed.play();这个不需要
        } else {
            //非IE内核浏览器
            var strAudio = "<audio id='audioPlay' src='" + src + "' hidden='true' loop='true'>";
            if ($("body").find("audio").length <= 0)
                $("body").append(strAudio);
            var audio = document.getElementById("audioPlay");

            //浏览器支持 audion
            audio.play();
        }
    }
    
    function likeUp() {
        var pid = '<?php echo ($info["id"]); ?>';
        var uid = "<?php echo ($uid); ?>";
        var url = "<?php echo U('Lecture/like');?>";
        $.post(url,{pid:pid,uid:uid},function (data) {
            alert(data);
            location.reload();
            console.log(data);
        })
    }

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