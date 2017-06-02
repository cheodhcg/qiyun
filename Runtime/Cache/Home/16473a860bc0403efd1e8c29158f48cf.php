<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>人脉圈</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <script type="text/javascript" src="js/swiper.min.js"></script>
    <!--<link rel="stylesheet" href="../style.css">-->
</head>
<body>
<div class="rmq_title oh">
    <ul class="rmq_t_ul">
        <li><a href="<?php echo U('Contact/index');?>" class="rmq_a" >人脉</a></li>
        <li><a href="<?php echo U('Contact/news');?>">商机</a></li>
        <li><a href="<?php echo U('Contact/release_news');?>">发布</a></li>
        <a href="搜索.html" class="search_r">
            <img src="images/search.png" alt="aa" width="100%">
        </a>
    </ul>
    <div class="rmq_list container oh" align="center">
        <ul>
        <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('index?cate_id='.$v['id']);?>" <?php if(($v['id']) == $cate_id): ?>class="rmq_a2"<?php endif; ?>><?php echo ($v['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        
    </div>
</div>
<div class="rmq_info">
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="rmq_person oh ">
        <div class="card_img">
            <img src="<?php echo ($vo['face']); ?>" alt="企知道头像" width="50" style="border-radius: 25px">
        </div>
        <div class="card-userinfo">
            <h3 style="color: #ff827e;"><?php echo ($vo['username']); ?></h3>
            <p><?php echo ($vo['position']); ?></p>
        </div>
        <div class="card-contact">
            <p>Tel:<?php echo ($vo['phone']); ?></p>
            <p><?php echo ($vo['company']); ?></p>
        </div>

    </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<!--<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="rmq_person oh ">
        <div class="rmq-title">
            <div class="fl rmq_q_img">
                <img src="<?php echo ($vo['face']); ?>" alt="aa" width="100%">
            </div>
            <div class="fl rmq_i">
                <p><?php echo ($vo['username']); ?>
                    <?php if(($vo['status']) == "0"): ?><span class="fr rmq_span1 db">关注</span>
                    <span class="fr rmq_span2 dn">已关注</span>
                    <?php else: ?>
                    <span class="fr rmq_span1 db">关注</span>
                    <span class="fr rmq_span2 dn">已关注</span><?php endif; ?>
                </p>
                <p><?php echo ($vo['area']); ?> | <?php echo ($vo['company']); ?> | <?php echo ($vo['position']); ?></p>
            </div>
        </div>

            <div class="rmq_p_text">
                <p><?php echo ($vo['content']); ?></p>
            </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?> -->
</div>
<script src="js/jquery-1.9.1.min.js"></script>
<script>
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