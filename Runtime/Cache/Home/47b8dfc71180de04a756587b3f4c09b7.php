<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>发起讲座</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
    <script src="js/jquery-1.9.1.min.js"></script>
</head>
<body style="background: #fff">
<form action="" method="post" enctype="multipart/form-data" id="form1">
<div class="tw_info container oh">
    <div class="tw_title">
        <span class="r_span">讲座标题</span>
        <input type="text" name="title" id="title" placeholder="填写讲座标题">
    </div>
    <div class="tw_cont">
        <span class="r_span2">讲座介绍</span>
        <textarea style="margin-top: 2px" name="content" id="content" placeholder="填写讲座介绍"></textarea>
    </div>
    <div class="tw_fl oh">
        <span class="r_span2">讲座类型 <br>
        <small>(最多选两个)</small>
        </span>
        <div class="tw_form" style="margin-top: -3px;">
            <?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="fl_btn">
                <label for="oCheck<?php echo ($i); ?>">
                <input type="checkbox" name="type[]" id="oCheck<?php echo ($i); ?>" value="<?php echo ($v['id']); ?>">&nbsp;<?php echo ($v['title']); ?></label>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!--验证选择项-->
        <script type="text/javascript">
            $('input[type=checkbox]').click(function() {
                $("input[name='type[]']").attr('disabled', true);
                if ($("input[name='type[]']:checked").length >= 2) {
                    $("input[name='type[]']:checked").attr('disabled', false);
                } else {
                    $("input[name='type[]']").attr('disabled', false);
                }
            });
        </script>

    </div>
    <div class="jz_fm fl">
        <span class="fl r_span2" style="font-size: 16px">讲座封面</span>
            <!-- <label for="fileTne"><img style="margin-top: 2px" class="fl"  src="images/upload.png" alt="aa"></label> -->
            <input type="file" class="" id="fileTne" name="icon" style="width:70%;">

    </div>
    <div class="jz-fs fl ">
        <span class="fl r_span2" style="font-size: 16px">讲座方式</span>
        <div class="jz-xz fl" style="margin-top: 2px">
            <div class="jz_xz_box oh">
                <a href="##" class="jz-xz-a jz-xz-a1">视频</a>
                <a href="##" class="jz-xz-a2">语音</a>
            </div>

            <div class="jz_xz_1 jz_xz_info " style="width: 99%; border-top: none;">
                <label for="fileOne" style="border-radius: 15px ;border: 1px solid #0076c2;padding: 2px 3px;color: #0076c2">选择文件</label>
                <input type="file" class="dn" id="fileOne" name="content_icon" style="width:70%;">
            </div>
            <div class="jz_xz_2 jz_xz_info dn " style="border-top: none;">
                <img src="images/wt1_03.png" alt="aa">
            </div>
        </div>

    </div>


    <div class="tw_title" style="margin-top: 10px;">
        <span  class="r_span">设置金额</span>
        <input style="width: 73%;" type="text" name="money" id="money" placeholder="请设置金额">
    </div>

</div>
<input style="margin-bottom: 30px;" class="tj_btn" type="button" value="确认上传">
</form>
<script type="text/javascript">
    /*//上传图片
    $("#fileTne").change(function(event) {
        var form=document.getElementById("form1");
        var formData=new FormData(form);
        var oReq = new XMLHttpRequest();
        oReq.onreadystatechange=function(){
            if(oReq.readyState==4){
                if(oReq.status==200){
                    var json=JSON.parse(oReq.responseText);
                    var result = '';
                }
            }
        };
        oReq.open("POST", "<?php echo U('Center/headimg');?>");
        oReq.send(formData);
        location.href = "/index.php?s=/Center/info";
        //return false;
    });*/

    $(".tj_btn").click(function(event) {
        if($("#title").val() == ""){
            alert('填写讲座标题');return false;
        }
        if($("#content").val() == ""){
            alert('填写讲座介绍');return false;
        }
        if($("input[type='checkbox']").is(':checked') == false){
            alert('请选择讲座类型');return false;
        }

        if($("#fileTne").val()==""){
            alert('请上传讲座封面');return false;
        }
        if($("#fileOne").val()==""){
            alert('请上传讲座视频');return false;
        }
        if($("#money").val() == ""){
            alert('请设置金额');return false;
        }

        $("#form1").submit();
    });
    $(function () {
        $('.jz-xz-a1').click(function () {
            $(this).addClass('jz-xz-a');
            $('.jz_xz_1').show();
            $('.jz_xz_2').hide();
            $('.jz-xz-a2').removeClass('jz-xz-a');
        });
        $('.jz-xz-a2').click(function () {
            $(this).addClass('jz-xz-a');
            $('.jz_xz_2').show();
            $('.jz_xz_1').hide();
            $('.jz-xz-a1').removeClass('jz-xz-a');
        });
    })
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