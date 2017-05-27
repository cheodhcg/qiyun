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
<form action="" method="post" enctype="multipart/form-data">
<div class="tw_info container oh">
    <div class="tw_title">
        <span>讲座标题</span>
        <input type="text" name="title" placeholder="填写讲座标题">
    </div>
    <div class="tw_cont">
        <span>讲座介绍</span>
        <textarea name="content" placeholder="填写讲座介绍"></textarea>
    </div>
    <div class="tw_fl oh">
        <span>讲座类型 <br>
        <small>(最多选两个)</small>
        </span>
        <div class="tw_form">
            <?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="fl_btn">
                <input type="checkbox" name="type[]" id="oCheck" value="<?php echo ($v['id']); ?>">&nbsp;<?php echo ($v['title']); ?>
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
        <span class="fl">讲座封面</span>
            <label for="fileTne"><img class="fl"  src="images/fq_03.png" alt="aa"></label>
            <input type="file" class="dn" id="fileTne" name="icon" style="">

    </div>
    <div class="jz-fs fl ">
        <span class="fl">讲座方式</span>
        <div class="jz-xz fl">
            <div class="jz_xz_box oh">
                <a href="##" class="jz-xz-a jz-xz-a1">视屏</a>
                <a href="##" class="jz-xz-a2">语音</a>
            </div>

            <div class="jz_xz_1 jz_xz_info ">
                <label for="fileOne">选择文件</label>
                <!--<input type="file" class="dn" id="fileOne" name="content_icon" style="">-->
            </div>
            <div class="jz_xz_2 jz_xz_info dn ">
                <img src="images/wt1_03.png" alt="aa">
            </div>
        </div>

    </div>
    <div class="tw_cont">
        <span>设置金额</span>
        <input type="text" name="money" placeholder="请设置金额">
    </div>
</div>
<input style="margin-bottom: 30px;" class="tj_btn" type="submit" value="确认上传">
</form>
<div class="nav_h">
</div>
<div class="nav oh">
    <ul class="nav_ul">
        <a href="01问答.html">
            <li align="center" class="nav_a">
                <span><img src="images/w_17.png" alt="aa" width=""></span><span>问答</span>
            </li></a>
        <a href="微讲座.html">
            <li align="center" class="">
                <span><img src="images/w_19.png" alt="aa" width=""></span><span>微讲座</span>
            </li></a>
        <a href="商城.html">
            <li align="center"><span>
                <img src="images/w_21.png" alt="aa" width=""></span><span>商城</span>
            </li>
        </a>
        <a href="人脉圈.html">
            <li align="center">
                <span><img src="images/w_23.png" alt="aa" width="" align="absmiddle"></span><span>人脉圈</span>
            </li></a>
        <a href="我的.html">
            <li align="center">
                <span><img src="images/w_25.png" alt="aa" width="" ></span><span>我的</span>
            </li>
        </a>
    </ul>
</div>
</body>
</html>