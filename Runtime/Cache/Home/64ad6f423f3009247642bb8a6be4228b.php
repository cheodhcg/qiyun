<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>问题详情</title>
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


</head>
<body>
<div class="wt_info ">
    <div class="question_info container  oh underline">
        <h3><?php echo ($info['title']); ?></h3><?php echo ($time); ?>
        <p><?php echo ($info['content']); ?></p>

        <?php if($info['userinfo']['face']): ?><p style="display: inline-block;line-height: 40px">
            <span class="q_img1 fl">
                <a href="<?php echo U('Index/userinfo?uid='.$info['uid']);?>">
                     <img class="fl" src="<?php echo ($info['userinfo']['face']); ?>" alt="aa" width="40">
                </a>
            <span class="q_text1" style=""><?php echo ($info['userinfo']['username']); ?></span>
            </span>
                <span class="q_text2 fr"><?php echo ($info['userinfo']['company']); ?> | <?php echo ($info['userinfo']['position']); ?></span>
            </p><?php endif; ?>
    </div>
    <div class="q_a container oh">
        <div class="q_a_title oh">
            <a href="<?php echo U('Index/question_release');?>"><span><img src="images/wt_03.png" alt="aa" width="100%"
                                                                align="absmiddle"></span>我要提问</a>
            <a href=""><span><img src="images/h_03.png" alt=" aa" width="100%" align="absmiddle"></span>我要回答</a>
            <a href="##" class="fr r_2"> <span><?php echo ($info['number']); ?></span>人回答</a>
        </div>
        <div class="q_a_info1">
            <?php if($is_answer): ?><div class="yy_btn"><span style="width:120px;">您已回答过该问题</span></div>
                <?php else: ?>
                <div class="yy_btn startRecord mobile_btn" style="display: block">
                <span>
                    <a href="javascript:void(0);" style="display: block" id="push_answer">
                        <img src="images/wt1_03.png" alt="aa" width="100%">
                    </a>
                </span>
                    <span class="btn_tips">按住说话</span>
                </div>
                <!--停止录音-->
                <div class="yy_btn stopRecord" style="display: none">
                <span>
                    <a href="javascript:void(0);" style="display: block" id="push_answer2">
                        <img src="images/wt1_03.png" alt="aa" width="100%">
                    </a>
                </span>
                    <span class="btn_tips">停止录音</span>
                </div><?php endif; ?>

        </div>
    </div>
    <?php if(!$is_answer): ?><div style="text-align: right">
            <a href="javascript:void(0);" id="push_answer3" style="display: inline-block;">播放录音</a>
            <a href="javascript:void(0);" id="push_answer4" style="display: none;">停止播放</a>
            <a href="#" data-pid="<?php echo ($pid); ?>" id="submit_answer">提交回答</a>
        </div><?php endif; ?>


    <div class="xg_question oh ">
        <div class="xg_title underline oh container ">
            <a href="" style="pointer-events:none;"><span><img src="images/wt_06.png" alt=" aa" width="100%"
                                                               align="absmiddle"></span>回答提问</a>
        </div>
        <div class="xg_info container">
            <div class="wd_cont ">
                <?php if(is_array($xglist)): $i = 0; $__LIST__ = $xglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$x): $mod = ($i % 2 );++$i;?><div class="wd_c_box underline oh ">
                        <!-- <p><?php echo ($x['content']); ?></p>
                        <p><?php echo ($x['userinfo']['username']); ?>（<?php echo ($x['userinfo']['position']); ?>）  |  <?php echo ($x['userinfo']['area']); ?>   <?php echo ($x['userinfo']['company']); ?></p> -->
                        <div style="">
                            <div class="wd_img_t fl" style="height: 48px;width: 48px">
                                <img src="<?php echo ($x['face']); ?>" alt="aa" width="48" id="playVoice" style="border-radius: 24px;padding: 0">
                            </div>
                            <!--<div class="wd_img_y fl" >
                                <img src="images/w_10.png" alt="aa" width="100%" align="bottom" style="border-radius: 20px">
                                <span><?php echo ($x['money']); ?>元试听</span>
                            </div>-->
                            <div class="weixinAudio fl">
                                <!--http://wbcfzk.natappfree.cc/qiyun/Public/static/webchataudio/sound/2.mp3-->
                                <audio src="/qiyun<?php echo ($x["content"]); ?>" id="media" width="1" height="1" preload></audio>
                                <span id="audio_area" class="db audio_area">
                                <span class="audio_wrp db">
                                <span class="audio_play_area">
                                    <i class="db icon_audio_default"></i>
                                    <i class="db icon_audio_playing"></i>
                                </span>

                                <span class="db audio_info_area">
                                    <strong class="db audio_title"><?php echo ($x['money']); ?>元试听</strong>
                                </span>
                                <span id="audio_progress" class="progress_bar" style="width: 0%;"></span>
                                </span>
                                </span>
                                <span id="audio_length" class="audio_length tips_global" style="float: right;">00:00"</span>
                            </div>

                            <!--<div class="wd_t fr"><span><?php echo ($x['num']); ?></span>人听过</div>-->
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>

            </div>
        </div>
    </div>
</div>


<script src="/qiyun/wx/wx_jssdk.js"></script>

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
<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script src="/qiyun/Public/static/jquery-2.0.3.min.js"></script>

<script>
    var voice = {
        localId: '',
        serverId: ''
    };
    wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: '<?php echo ($jssdk["appId"]); ?>', // 必填，公众号的唯一标识
        timestamp: '<?php echo ($jssdk["timestamp"]); ?>', // 必填，生成签名的时间戳
        nonceStr: '<?php echo ($jssdk["nonceStr"]); ?>', // 必填，生成签名的随机串
        signature: '<?php echo ($jssdk["signature"]); ?>',// 必填，签名，见附录1

        jsApiList: [

            'startRecord',
            'stopRecord',
            'onVoiceRecordEnd',
            'playVoice',
            'onVoicePlayEnd',
            'pauseVoice',
            'stopVoice',
            'uploadVoice',
            'downloadVoice'
        ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });

    //假设全局变量已经在外部定义
    //按下开始录音
    $('.startRecord').on('touchstart', function (event) {
        event.preventDefault();
        START = new Date().getTime();

        recordTimer = setTimeout(function () {
            wx.startRecord({
                /*    success: function(){
                 localStorage.rainAllowRecord = 'true';
                 },*/
                cancel: function () {
                    alert('用户拒绝授权录音');
                }
            });
        }, 300);
    });
    //松手结束录音
    $('.startRecord').on('touchend', function (event) {
        event.preventDefault();
        END = new Date().getTime();

        if ((END - START) < 300) {
            END = 0;
            START = 0;
            //小于300ms，不录音
            clearTimeout(recordTimer);
        } else {
            wx.stopRecord({
                success: function (res) {
                    voice.localId = res.localId;
                    if (voice.localId == '') {
                        alert('请先录制一段声音');
                        return;
                    }
                },
                fail: function (res) {
                    alert(JSON.stringify(res));
                }
            });
        }
    });

</script>
<script src="/qiyun/Public/static/webchataudio/js/weixinAudio.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $('.weixinAudio').weixinAudio({
        autoplay:false,

    });
</script>
</body>
</html>