<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
</head>

<style type="text/css">
    html {
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }

    .db {
        display: block;
    }

    .weixinAudio {
        line-height: 1.5;
    }

    .audio_area {
        display: inline-block;
        width: 100%;
        vertical-align: top;
        margin: 0px 1px 0px 0;
        font-size: 0;
        position: relative;
        font-weight: 400;
        text-decoration: none;
        -ms-text-size-adjust: none;
        -webkit-text-size-adjust: none;
        text-size-adjust: none;
    }

    .audio_wrp {
        border: 1px solid #ebebeb;
        background-color: #fcfcfc;
        overflow: hidden;
        padding: 12px 20px 12px 12px;
    }

    .audio_play_area {
        float: left;
        margin: 9px 22px 10px 5px;
        font-size: 0;
        width: 18px;
        height: 25px;
    }

    .playing .audio_play_area .icon_audio_default {
        display: block;
    }

    .audio_play_area .icon_audio_default {
        background: transparent url("/qiyun/Public/static/webchataudio/img/iconloop.png") no-repeat 0 0;
        width: 18px;
        height: 25px;
        vertical-align: middle;
        display: inline-block;
        -webkit-background-size: 54px 25px;
        background-size: 54px 25px;
        background-position: -36px center;
    }

    .audio_play_area .icon_audio_playing {
        background: transparent url("/qiyun/Public/static/webchataudio/img/iconloop.png") no-repeat 0 0;
        width: 18px;
        height: 25px;
        vertical-align: middle;
        display: inline-block;
        -webkit-background-size: 54px 25px;
        background-size: 54px 25px;
        -webkit-animation: audio_playing 1s infinite;
        background-position: 0px center;
        display: none;
    }

    .audio_area .pic_audio_default {
        display: none;
        width: 18px;
    }

    .tips_global {
        color: #8c8c8c;
    }

    .audio_area .audio_length {
        float: right;
        font-size: 14px;
        margin-top: 3px;
        margin-left: 1em;
    }

    .audio_info_area {
        overflow: hidden;
    }

    .audio_area .audio_title {
        font-weight: 400;
        font-size: 17px;
        margin-top: -2px;
        margin-bottom: -3px;
        width: auto;
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
        left: 0;
        bottom: 0;
        background-color: #0cbb08;
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
            background-position: -18px center;
        }
        61% {
            background-position: -18px center;
        }
        61.5% {
            background-position: -36px center;
        }
        100% {
            background-position: -36px center;
        }
    }
</style>

<body>
<p class="weixinAudio">
    <audio src="http://wbcfzk.natappfree.cc/qiyun/Public/static/webchataudio/sound/2.mp3" id="media" width="1" height="1" preload></audio>
    <span id="audio_area" class="db audio_area">
			<span class="audio_wrp db">
			<span class="audio_play_area">
				<i class="icon_audio_default"></i>
				<i class="icon_audio_playing"></i>
            </span>
			<span id="audio_length" class="audio_length tips_global">00:00</span>
			<span class="db audio_info_area">
                <strong class="db audio_title">Title/问题的标题</strong>
                <span class="audio_source tips_global">From/用户名</span>
			</span>
			<span id="audio_progress" class="progress_bar" style="width: 0%;"></span>
			</span>
			</span>
</p>




<p>转码</p>
<a href="<?php echo U('index/test2');?>" class="">转码</a>
</body>
<script src="/qiyun/Public/static/jquery-2.0.3.min.js"></script>
<script src="/qiyun/Public/static/webchataudio/js/weixinAudio.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $('.weixinAudio').weixinAudio({
        autoplay:false,

    });
</script>

</html>