<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>发起提问</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
    <script src="js/jquery-1.9.1.min.js"></script>
</head>
<body style="background: #fff">
<form action="" method="post" enctype="multipart/form-data" id="form1">
<div class="tw_info container oh">
    <div class="tw_title">
        <span>提问标题</span>
        <input type="text" name="title" id="title" placeholder="填写提问标题">
    </div>
    <div class="tw_cont">
        <span>提问介绍</span>
        <textarea name="content" id="content" placeholder="填写提问介绍"></textarea>
    </div>
    <div class="tw_fl oh">
        <span>提问类型 <br>
        <small>(最多选两个)</small>
        </span>
        <div class="tw_form">
            <?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="fl_btn">
                <label for="oCheck<?php echo ($i); ?>">
                <input type="checkbox" name="type[]" id="oCheck<?php echo ($i); ?>" value="<?php echo ($v['id']); ?>">&nbsp;<?php echo ($v['title']); ?>
                </label>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!--验证选择项-->
 <!--       <script type="text/javascript">
            $('input[type=checkbox]').click(function() {
                $("input[name='type[]']").attr('disabled', true);
                if ($("input[name='type[]']:checked").length >= 2) {
                    $("input[name='type[]']:checked").attr('disabled', false);
                } else {
                    $("input[name='type[]']").attr('disabled', false);
                }
            });
        </script>-->
    </div>
    
    <!-- <div class="tw_cont">
        <span>设置金额</span>
        <input type="text" name="money" placeholder="请设置金额">
    </div> -->
</div>
<input style="margin-bottom: 30px;" class="tj_btn" type="button" value="提交问题">
</form>
<script type="text/javascript">
    $(".tj_btn").click(function(event) {
        var t1 = $('#form1').serializeArray();
        console.log(t1);
        return;
        if($("#title").val() == ""){
            alert('填写提问标题');return false;
        }
        if($("#content").val() == ""){
            alert('填写提问内容');return false;
        }
        if($("input[type='checkbox']").is(':checked') == false){
            alert('请选择提问类型');return false;
        }

        if($("#money").val() == ""){
            alert('请设置金额');return false;
        }

        $("#form1").submit();
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