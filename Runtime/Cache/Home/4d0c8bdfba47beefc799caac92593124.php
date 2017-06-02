<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>资讯详情</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
</head>
<body>

<div class="sp_banner">
    <img src="<?php echo ($info["icon"]); ?>" alt="aa" width="100%" height="152px;">
</div>
<div class="sp_list container oh">
    <div class="sp_title  underline">
        <span><?php echo ($info['title']); ?></span>
        <span></span>
    </div>
    <div class="sp_info">
        <!-- <span>资讯内容:</span> -->
        <p><?php echo ($info['content']); ?></p>
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
<!--<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
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
        autoplay:true,

    });
</script>-->
</body>
</html>