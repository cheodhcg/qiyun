<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>培训详情</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
</head>
<body>
<div class="banner_p">
    <img src="<?php echo ($info['icon']); ?>" alt="aa" width="100%">
</div>
<div class="px_info oh">
    <div class="zan_p container underline  oh">
        <div class="zan_p_l fl ">
            <span><a href="<?php echo U('Lecture/like',array('id'=>$info['id']));?>" id="like">
                <img src="images/px_05.png" align="absmiddle" alt="aa" width="100%">
            </a></span>
            <span><?php echo ($info['likelist']); ?></span>
        </div>
        <div class="zan_p_r fr">
            <span><a href="<?php echo U('Lecture/reward',array('id'=>$info['id']));?>">打赏</a></span>
            <span><?php echo ($info['rewardnum']); ?>人</span>
        </div>
    </div>
</div>
<div class="px_info2 oh container">
    <h3><?php echo ($info['title']); ?></h3>
    <p><?php echo ($info['content']); ?></p>
    <img src="images/w_10.png" alt="aa" width="100%" align="bottom" id="bofang">
</div>
<div class=" y_btn ">
<?php if($info['money']): ?><a href="##"><?php echo ($info['money']); ?>元开始学习</a>
<?php else: ?>
	<a href="##">开始学习</a><?php endif; ?>
</div>
<script src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
    var src = "<?php echo ($info['content_icon']); ?>";
    //用户点播放
    $("#bofang").click(function(event) {
        $("#bofang").attr('src','images/4.gif');
        playSound();
    });


    function playSound(){
       var borswer = window.navigator.userAgent.toLowerCase();
       if ( borswer.indexOf( "ie" ) >= 0 )
       {
         //IE内核浏览器
         var strEmbed = '<embed name="embedPlay" src="'+src+'" autostart="true" hidden="true" loop="false"></embed>';
         if ( $( "body" ).find( "embed" ).length <= 0 )
           $( "body" ).append( strEmbed );
         var embed = document.embedPlay;

         //浏览器不支持 audion，则使用 embed 播放
         embed.volume = 100;
         //embed.play();这个不需要
       } else{
         //非IE内核浏览器
         var strAudio = "<audio id='audioPlay' src='"+src+"' hidden='true' loop='true'>";
         if ( $( "body" ).find( "audio" ).length <= 0 )
           $( "body" ).append( strAudio );
         var audio = document.getElementById( "audioPlay" );

         //浏览器支持 audion
         audio.play();
       }
    }

</script>
<div class="nav_h">
</div>
<?php  $url = $_SERVER['QUERY_STRING']; $arr = explode('/', $url); $str = $arr[2]; ?>
<div class="nav oh">
    <ul class="nav_ul">
        <a href="<?php echo U('Index/index');?>">
            <li align="center" <?php if(($str) == "Index"): ?>class="nav_a"<?php endif; ?>>
                <span>
                <?php if(($str) == "Index"): ?><img src="images/w_17.png" alt="aa" width="" >
                <?php else: ?>
                <img src="images/w_1.png" alt="aa" width="" ><?php endif; ?>
                </span>
                <span>问答</span>
            </li></a>
        <a href="<?php echo U('Lecture/index');?>" <?php if(($str) == "Lecture"): ?>class="nav_a"<?php endif; ?>>
            <li align="center" class="">
                <span>
                <?php if(($str) == "Lecture"): ?><img src="images/w_4.png" alt="aa" width="" >
                <?php else: ?>
                <img src="images/w_19.png" alt="aa" width="" ><?php endif; ?>
                </span>
                <span>微讲座</span>
            </li></a>
        <a href="<?php echo U('Shop/index');?>" <?php if(($str) == "Shop"): ?>class="nav_a"<?php endif; ?>>
            <li align="center">
                <span>
                <?php if(($str) == "Shop"): ?><img src="images/w_18.png" alt="aa" width="" >
                <?php else: ?>
                <img src="images/w_21.png" alt="aa" width="" ><?php endif; ?>
                </span>
                <span>商城</span>
            </li>
        </a>
        <a href="<?php echo U('Contact/index');?>" <?php if(($str) == "Contact"): ?>class="nav_a"<?php endif; ?>>
            <li align="center">
                <span>
                <?php if(($str) == "Contact"): ?><img src="images/w_30.png" alt="aa" width="" align="absmiddle">
                <?php else: ?>
                <img src="images/w_23.png" alt="aa" width="" align="absmiddle"><?php endif; ?>
                </span>
                <span>人脉圈</span>
            </li></a>
        <a href="<?php echo U('User/index');?>" <?php if(($str) == "User"): ?>class="nav_a"<?php endif; ?>>
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