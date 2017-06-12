<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>成为专业会员</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
</head>
<body style="">
<div class="vip_zy container oh">
<form method="post" action="">
    <div class="vip_input">
        <p><span>姓名</span><input type="text" name="username" id="username" placeholder="请输入您的真实姓名"></p>
        <p><span>电话</span><input type="text" name="phone" id="phone" placeholder="请输入您的联系方式"></p>
        <p><span>公司</span><input type="text" name="company" id="company" placeholder="请输入您的所在的公司名称"></p>
        <p><span>职位</span>
            <select name="position" class="">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v['id']); ?>"><?php echo ($v['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </p>
        <p><span>地区</span><input type="text" name="area" id="area" placeholder="请输入您的所在的地区"></p>
    </div>
    <div class="wt_fl oh">
        <span class="fl">擅长领域</span>
        <ul class="fl" id="sc">
        <?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><li><input type="checkbox" class="fl_lable" name="excelled[]">&nbsp;<?php echo ($c['title']); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
            
        </ul>
    </div>

    <div class="my_info">
        <span class="fl">个人简介</span>
        <textarea name="content" id="content" placeholder="请填写您的个人简介">

        </textarea>
        <input type="checkbox" id="my_card_c" style="margin-left: 70px;margin-top: 10px;">        
        <label for="my_card_c">我已同意并阅读洪湖协议</label>
    </div>
    <div>
        <a href="##" class="vip_btn">提交</a>
    </div>
</form>
</div>
<script src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
    $(".vip_btn").click(function(event) {    

        if($("#username").val() == ""){
            alert('请输入您的真实姓名');return false;
        }
        if($("#phone").val() == ""){
            alert('请输入您的联系方式');return false;
        }
        if($("#company").val() == ""){
            alert('请输入您的所在的公司名称');return false;
        }
        
        if($("#area").val() == ""){
            alert('请输入您的所在的地区');return false;
        }
        var flog=false;
        $('#sc :checkbox').each(function() {
           if($(this).prop('checked')){flog=true;}
        });
        if(flog == false){
           alert('请选择您所擅长的领域');return false;
        }

        if($("#content").val() == ""){
            alert('请填写您的个人简介');return false;
        }
        if($("#my_card_c").is(":checked")){
            alert('请阅读协议');return false;
        }

        $(this).submit();

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