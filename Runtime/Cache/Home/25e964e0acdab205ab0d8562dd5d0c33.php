<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title><?php echo ($_title); ?></title>
<link rel="stylesheet" href="/qiyun/Public/Home/css/style.css">
<link rel="stylesheet" href="/qiyun/Public/Home/css/common.css">
<link rel="stylesheet" href="/qiyun/Public/Home/css/bootstrap.min.css">
</head>
<body style="background: #eef3f9">


<div class="user-txt-list  container" style="background: #fff ;margin-top: 0;">
    <div class="qa-info oh  ">
        <div class="qa-i-tit col-xs-12  ">
            <div class="col-xs-3 qa-i-header">
                <img src="<?php echo ($quesUser["face"]); ?>" alt="1" width="60">
            </div>
            <div class="col-xs-9 qa-i-introduce">
                <div class="col-xs-6"><?php echo ($quesUser["username"]); ?>（<?php echo ($quesUser["position"]); ?>）</div>
                <div class="col-xs-6"><?php echo ($quesUser["company"]); ?></div>
            </div>
        </div>
        <div class="col-xs-12  qa-i-txt">
            <?php echo ($info['content']); ?>
        </div>

        <div class="col-xs-12  qa-look underline-d">
            <span class="fr"><img src="/qiyun/Public/Home/images/micon_10.png" alt="i" width="25"><i><?php echo ($info['number']); ?></i>人回答</span>
        </div>

        <div class="huida oh">
            <?php if(!empty($info['questionlist'])): if(is_array($info['questionlist'])): $i = 0; $__LIST__ = $info['questionlist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="col-xs-12  qa-answer" data-id="<?php echo ($info['questionlist'][0][id]); ?>" onclick="playRecord(this)">
                        <div class="col-xs-2 qa-i-da row">
                            <img src="/qiyun/Public/Home/images/qa_05.png" alt="1" width="25">
                        </div>
                        <div class="col-xs-6 qa-i-voice">
                            <div class="voice-txt">1元收听</div>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                暂时没有回答哦<?php endif; ?>


        </div>

        <div class="col-xs-12  qa-look ">
            <span class="fr"><img src="/qiyun/Public/Home/images/qa_09.png" alt="i" width="25"><i><?php echo ($v['num']); ?></i>人看过</span>
        </div>
    </div>
</div>
<div class="xg-wt container" >
    <div class="xg-tit underline-d" >
        <img src="/qiyun/Public/Home/images/wt.jpg" alt="w" width="20">
        相关问题
    </div>
    <div class="qa-list ">
        <?php if(is_array($xglist)): $i = 0; $__LIST__ = $xglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$x): $mod = ($i % 2 );++$i;?><div class="qa-info oh  underline-d">
                <div class="qa-i-tit col-xs-12  ">
                    <div class="col-xs-3 qa-i-header">
                        <img src="/qiyun/Public/Home/images/qa_13.png" alt="1" width="60">
                    </div>
                    <div class="col-xs-9 qa-i-introduce">
                        <div class="col-xs-6"><?php echo ($x["userinfo"]["username"]); ?>（<?php echo ($x["userinfo"]["position"]); ?>）</div>
                        <div class="col-xs-6"><?php echo ($x["userinfo"]["company"]); ?></div>
                    </div>
                </div>
                <div class="col-xs-12  qa-i-txt">
                    <?php echo ($x['title']); ?>
                </div>
                <div class="col-xs-12  qa-answer">
                    <div class="col-xs-2 qa-i-da row">
                        <img src="/qiyun/Public/Home/images/qa_05.png" alt="1" width="25">
                    </div>
                    <div class="col-xs-6 qa-i-voice">
                        <div class="voice-txt"><?php echo ($x['questionlist']['money']); ?>元收听</div>
                    </div>
                </div>
                <div class="col-xs-12  qa-look">
                    <span class="fr"><img src="/qiyun/Public/Home/images/qa_09.png" alt="i" width="25"><i><?php echo ($x["questionlist"]["num"]); ?></i>人看过</span>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>



    </div>
</div>
<div class="ly-btn">

    <img src="/qiyun/Public/Home/images/wd_11.png" alt="40" width="60" class="startRecord">
</div>
<div class="f">

</div>
<div class="nav oh">
    <ul class="nav_ul">
        <a href="<?php echo U('Index/index?type=1');?>">
            <li align="center" <?php if($class == 1): ?>class="nav_a"<?php endif; ?>>
            <span>
                <?php if($class == 1): ?><img src="/qiyun/Public/Home/images/w_31_1.png" alt="aa" width="" >
                    <?php else: ?>
                    <img src="/qiyun/Public/Home/images/w_31.png" alt="aa" width="" ><?php endif; ?>

                </span>
            <span>问答</span>
            </li></a>
        <a href="<?php echo U('Lecture/index?type=2');?>" >
            <li align="center" <?php if($class == 2): ?>class="nav_a"<?php endif; ?>>
            <span>
                    <?php if($class == 2): ?><img src="/qiyun/Public/Home/images/w_19_1.png" alt="aa" width="" >
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_19.png" alt="aa" width="" ><?php endif; ?>
                </span>
            <span>微讲座</span>
            </li></a>
        <a href="<?php echo U('Shop/index?type=3');?>">
            <li align="center" <?php if($class == 3): ?>class="nav_a"<?php endif; ?>>
            <span>
                    <?php if($class == 3): ?><img src="/qiyun/Public/Home/images/w_21_1.png" alt="aa" width="" >
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_21.png" alt="aa" width="" ><?php endif; ?>
                </span>
            <span>商城</span>
            </li>
        </a>
        <a href="<?php echo U('Contact/index?type=4');?>" >
            <li align="center" <?php if($class == 4): ?>class="nav_a"<?php endif; ?>>
            <span>
                    <?php if($class == 4): ?><img src="/qiyun/Public/Home/images/w_23_1.png" alt="aa" width="" align="absmiddle">
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_23.png" alt="aa" width="" align="absmiddle"><?php endif; ?>

                </span>
            <span>人脉圈</span>
            </li></a>
        <a href="<?php echo U('User/index?type=5');?>" >
            <li align="center" <?php if($class == 5): ?>class="nav_a"<?php endif; ?>>
            <span>
                    <?php if($class == 5): ?><img src="/qiyun/Public/Home/images/w_25_1.png" alt="aa" width="" >
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_25.png" alt="aa" width="" ><?php endif; ?>

                </span><span>我的</span>
            </li>
        </a>
    </ul>
</div>
<script src="/qiyun/Public/Home/js/jquery-1.9.1.min.js"></script>
<script src="/qiyun/Public/Home/js/bootstrap.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
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
    function playRecord(obj) {
        var $id = $(obj).attr('data-id');
        $.post("<?php echo U('Index/recordVoice');?>",{id:$id},function (data) {
            if (data.status){
                console.log(data);
//                alert(data.data);
                wx.downloadVoice({
                    serverId: data.data, // 需要下载的音频的服务器端ID，由uploadVoice接口获得
                    isShowProgressTips: 1, // 默认为1，显示进度提示
                    success: function (res) {
                        var localId = res.localId; // 返回音频的本地ID

                        wx.playVoice({
                            localId: localId
                        });
                    }
                });

            }else{
                alert(data.data);
            }
        })
    }
</script>
</body>
</html>