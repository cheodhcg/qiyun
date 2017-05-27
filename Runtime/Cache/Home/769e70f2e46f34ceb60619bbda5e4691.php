<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>问答</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
</head>
<body>
<div class="wd_title">
    <div class="wd_t_cont fl ">
        <ul class="wd_ul">
            <li><a href="<?php echo U('Index/index');?>" <?php if($type == 0): ?>class="wd_a"<?php endif; ?>>推荐</a></li>
            <?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/index',array('id'=>$v['id']));?>" <?php if($type == $v['id']): ?>class="wd_a"<?php endif; ?>><?php echo ($v['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <span class="fr wd_t_cont_span ">
            <a href="<?php echo U('Index/question_release');?>">
                <img src="images/w_03.png" alt="aa" width="100%">
            </a>

        </span>
</div>
<div class="wd_cont " id="listdiv">
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="wd_c_box underline oh container">
        <p style="word-wrap:break-word"><a href="<?php echo U('Index/questioninfo?id='.$v['id']);?>"><?php echo ($v['content']); ?></a></p>
        <p><?php echo ($v['nickname']); ?>（<?php echo ($v['position']); ?>）  |  <?php echo ($v['area']); ?>   <?php echo ($v['company']); ?></p>
        <?php if($v['questionlist']): ?><div style="">
            <div class="wd_img_t fl">
                <a href="<?php echo U('User/info?uid='.$v['uid']);?>">
                    <img src="<?php echo ($v['questionlist']['face']); ?>" alt="aa" width="100%">
                </a>
            </div>
            <div class="wd_img_y fl">
                <img src="images/w_10.png" alt="aa" width="100%" align="bottom">
                <span><?php echo ($v['questionlist']['money']); ?>元收听</span>
            </div>
            <div class="wd_t fr"><span><?php echo ($v['questionlist']['num']); ?></span>人听过</div>
        </div><?php endif; ?>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <!-- <div class="wd_ad">
        <a href="##">
            <img src="images/w_14.png" alt=" aa" width="100%">
        </a>
    </div> -->
</div>
<?php echo ($a); ?>
<?php if($page == 1): ?><span class="loading">
   <img class="fl" src="images/load.png" alt="aa" height="100%"> 
   <span id="gengduo">点击加载更多</span>
</span><?php endif; ?> 
<script src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
    var p = 2;
    $("#gengduo").click(function(event) {
        var id = "<?php echo ($_GET['id']); ?>";
        $.ajax({
            url: "<?php echo U('Index/index');?>",
            type: 'GET',
            dataType: 'json',
            data: {id:id,p:p},
            success: function(data, textStatus, xhr) {
              var tmp='';
              if (data.status==0) {
                 $("#gengduo").text('没有更多信息');
                 $(".loading").css("background-color","#cccccc");
                 return false;
              };
              $.each(data.info, function(index, v) {
                if(v.questionlist){
                   tmp+='<div class="wd_c_box underline oh container"><p style="word-wrap:break-word"><a href="/index.php?s=/Home/Index/questioninfo/id/'+v.id+'">'+v.content+'</a></p><p>'+v.nickname+'（'+v.position+'）  |  '+v.area+'   '+v.company+'</p><div style=""><div class="wd_img_t fl"><img src="'+v.face+'" alt="" width="100%"></div><div class="wd_img_y fl"><img src="images/w_10.png" alt="aa" width="100%" align="bottom"><span>'+v.money+'元收听</span></div><div class="wd_t fr"><span>'+v.num+'</span>人听过</div></div></div>';
                }else{
                    tmp+='<div class="wd_c_box underline oh container"><p style="word-wrap:break-word"><a href="/index.php?s=/Home/Index/questioninfo/id/'+v.id+'">'+v.content+'</a></p><p>'+v.nickname+'（'+v.position+'）  |  '+v.area+'   '+v.company+'</p></div>';
                }
              });
              if (tmp) {
                    $('#listdiv').append(tmp);
              };
             p++;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
             
            }
        })
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