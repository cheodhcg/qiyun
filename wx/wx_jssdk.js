/*
 * 注意：
 * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
 * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
 * 3. 完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
 *
 * 如有问题请通过以下渠道反馈：
 * 邮箱地址：weixin-open@qq.com
 * 邮件主题：【微信JS-SDK反馈】具体问题
 * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
 */
wx.ready(function () {


    // 3 智能接口


    // 4 音频接口
    // 4.2 开始录音
  /*  document.querySelector('#push_answer').onclick = function () {
        $('.stopRecord').fadeToggle(0);
        $('.startRecord').fadeToggle(0);
        wx.startRecord({
            cancel: function () {
                alert('用户拒绝授权录音');
            }
        });
    };

    // 4.3 停止录音
    document.querySelector('#push_answer2').onclick = function () {
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
        $('.stopRecord').fadeToggle(0);
        $('.startRecord').fadeToggle(0);
    };*/

    // 4.4 监听录音自动停止
    wx.onVoiceRecordEnd({
        complete: function (res) {
            voice.localId = res.localId;
            alert('录音时间已超过一分钟，自动停止');
        }
    });

    // 4.5 播放音频
    document.querySelector('#push_answer3').onclick = function () {
        if (voice.localId == '') {
            alert('请先录制一段声音');
            return;
        }
        wx.playVoice({
            localId: voice.localId
        });
        $('#push_answer3').fadeToggle(0);
        $('#push_answer4').fadeToggle(0);
    };

 /*   // 4.6 暂停播放音频
    document.querySelector('#push_answer4').onclick = function () {
        wx.pauseVoice({
            localId: voice.localId
        });
    };*/

    // 4.7 停止播放音频
    document.querySelector('#push_answer4').onclick = function () {
        wx.stopVoice({
            localId: voice.localId
        });
        $('#push_answer3').fadeToggle(0);
        $('#push_answer4').fadeToggle(0);
    };

    // 4.8 监听录音播放停止
    wx.onVoicePlayEnd({
        complete: function (res) {
            // alert('录音（' + res.localId + '）播放结束');
        }
    });

    // 4.8 上传语音
    document.querySelector('#submit_answer').onclick = function () {
        if (voice.localId == '') {
            alert('请先录制一段声音');
            return;
        }
        wx.uploadVoice({
            localId: voice.localId,
            success: function (res) {

                // alert('上传语音成功，serverId 为' + res.serverId);
                voice.serverId = res.serverId;
                if (voice.serverId == '') {
                    alert('请先上传声音');
                    return;
                }
                wx.downloadVoice({
                    serverId: voice.serverId,
                    success: function (res) {
                        // alert('下载语音成功，localId 为' + res.localId);
                        var pid = $('#submit_answer').attr('data-pid');
                        // var url = "http://qiyun.mmqo.com/index.php?s=/Home/Index/uploadAnswer.html";
                        // var url = "/qiyun/index.php?s=/Home/Index/uploadAnswer"+"/pid/"+pid+".html";
                        var url = "/qiyun/index.php?s=/Home/Index/uploadAnswer.html";

                        $.post(url,{serverId:voice.serverId,pid:pid},function(data){
                            // data = $.parseJSON(data);
                            alert(data.msg);
                            location.reload();
                        });
                        $('#submit_answer').attr('href',url);
                    }
                });
            }
        });
    };

    // 4.9 下载语音
/*    document.querySelector('#downloadVoice').onclick = function () {
        if (voice.serverId == '') {
            alert('请先使用 uploadVoice 上传声音');
            return;
        }
        wx.downloadVoice({
            serverId: voice.serverId,
            success: function (res) {
                alert('下载语音成功，localId 为' + res.localId);
                voice.localId = res.localId;
            }
        });
    };*/




    function decryptCode(code, callback) {
        $.getJSON('/jssdk/decrypt_code.php?code=' + encodeURI(code), function (res) {
            if (res.errcode == 0) {
                codes.push(res.code);
            }
        });
    }
});

wx.error(function (res) {
    alert(res.errMsg);
});


