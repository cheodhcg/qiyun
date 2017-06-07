<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title><?php echo ($_title); ?></title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/common.css">
<style type="text/css">
    html {
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }

    .db {
        display: block;
    }

    .weixinAudio {
        line-height: 1.5;
        border-radius: 25px;
        height: 30px;
        width: 200px;
        margin-left: 10px;
        /*background: url("images/w_10.png");*/
    }

    .audio_area {
        display: inline-block;
        width: 150px;
        vertical-align: top;
        margin: 0px 1px 0px 0;
        font-size: 0;
        font-weight: 400;
        text-decoration: none;
        -ms-text-size-adjust: none;
        -webkit-text-size-adjust: none;
        text-size-adjust: none;
        position: relative;
    }

    .audio_wrp {
        width: 155px;
        border: 1px solid #ebebeb;
        /*background-color: #fcfcfc;*/
        /*overflow: hidden;*/
        /*padding: 12px 20px 12px 12px;*/
        background: #ff5854;
        border-radius: 20px;
        height: 30px;
        line-height: 30px;
        color: #fff;
        position: relative;
        z-index: 999;
        top:8px;
        left: 5px;
    }

    .audio_wrp:after {
        content: "";
        z-index: -1;
        border: 0 solid transparent;
        border-bottom: 20px solid #ff5854;
        -moz-border-radius: 0 0 0 200px;
        -webkit-border-radius: 0 0 0 200px;
        border-radius: 0 0 0 200px;
        width: 30px;
        height: 30px;
        position: relative;
        /*margin-top: 20px;*/
        -webkit-transform: rotate(-30deg);
        -moz-transform: rotate(-30deg);
        -ms-transform: rotate(-30deg);
        -o-transform: rotate(-30deg);
        position: absolute;
        top: -14px;
        left:-12px;
    }

    .audio_play_area {
        float: left;
        margin: 0 10px 0 8px;
        font-size: 0;
        width: 18px;
        height: 25px;
    }

    .playing .audio_play_area .icon_audio_default {
        display: block;
    }

    .audio_play_area .icon_audio_default {
        background: transparent url("/qiyun/Public/static/webchataudio/img/iconloop.png") no-repeat 0 0;
        width: 14px;
        height: 18px;
        vertical-align: middle;
        display: inline-block;
        -webkit-background-size: 40px 18px;
        background-size: 40px 18px;
        background-position: -26px center;
        margin: 0;
        top: 0;
        left: 0;
    }

    .audio_play_area .icon_audio_playing {
        background: transparent url("/qiyun/Public/static/webchataudio/img/iconloop.png") no-repeat 0 0;
        width: 13px;
        height: 18px;
        vertical-align: middle;
        -webkit-background-size: 40px 18px;
        background-size: 40px 18px;
        -webkit-animation: audio_playing 1s infinite;
        background-position: 0px center;
        margin: 0;
        display: none;
    }

    .audio_area .pic_audio_default {
        display: none;
        width: 18px;
    }

    .tips_global {
        color: #ccc;
    }

    .audio_area .audio_length {
        color: #fff;
        float: right;
        font-size: 12px;
        margin-top: 3px;
        margin-left: 1em;
    }

    .audio_info_area {
        overflow: hidden;
    }

    .audio_area .audio_title {
        font-weight: 400;
        font-size: 14px;
        /*margin-top: -2px;*/
        /*margin-bottom: -3px;*/
        width: 80px;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        word-wrap: normal;
    }

    .audio_area .audio_source {
        font-size: 14px;
    }

    .audio_area .progress_bar {
        position: absolute;
        left: 40px;
        bottom: 50%;
        background-color: #fff;
        height: 2px;
    }

    .playing .audio_play_area .icon_audio_default {
        display: none;
    }

    .playing .audio_play_area .icon_audio_playing {
        display: inline-block;
    }

    @-webkit-keyframes audio_playing {
        30% {
            background-position: 0px center;
        }
        31% {
            background-position: -13px center;
        }
        61% {
            background-position: -13px center;
        }
        61.5% {
            background-position: -27px center;
        }
        100% {
            background-position: -27px center;
        }
    }
</style>
<script src="/qiyun/Public/static/jquery-2.0.3.min.js"></script>

</head>
<body>
<div class="my container oh">


    <div class="my_text">
        <p><span>
		<?php if($info['face']): ?><img src="<?php echo ($info['face']); ?>" alt="aa" width="100%">
		<?php else: ?>
		<img src="images/timg.jpg" alt="aa" width="100%"><?php endif; ?>
		</span></p>
        <p><strong><?php echo ($info['nickname']); ?></strong></p>
    </div>
</div>
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