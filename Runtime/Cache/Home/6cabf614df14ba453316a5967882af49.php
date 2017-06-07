<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>信息交流</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
    <style>
        .xxjl_info div:last-child{
            border: none;
        }
    </style>
</head>
<body style="background: #fff">
<div class="rmq_title oh">
    <ul class="rmq_t_ul">
        <li><a href="<?php echo U('Contact/index');?>">人脉</a></li>
        <li><a href="<?php echo U('Contact/news');?>" class="rmq_a">商机</a></li>
        <li><a href="<?php echo U('Contact/release_news');?>" >信息发布</a></li>
        <a href="<?php echo U('Contact/search_user');?>" class="search_r"><img src="images/search.png" alt="aa" width="100%"></a>
    </ul>

</div>

<div class="wd_title1 underline">
    <div class="wd_t_cont1 fl  " style="width: 100%">
        <ul class="wd_ul oh">
            <li><a href="<?php echo U('news');?>" <?php if(($cate_id) == "0"): ?>class="wd_a"<?php endif; ?>>推荐</a></li>
            <?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Contact/news?cate_id='.$c['id']);?>" <?php if(($c['id']) == $cate_id): ?>class="wd_a"<?php endif; ?>><?php echo ($c['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>

</div>


<div class="xxjl_info container oh" id="newlist">
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="xxjl_cont underline ">
        <div class="xxjl_img fl">
            <img src="<?php echo ($vo['icon']); ?>" alt="aa" width="100%">
        </div>
        <div class="xxjl_text fl">
            <p><a href="<?php echo U('info?id='.$vo['id']);?>"><?php echo ($vo['title']); ?></a></p>
            <p><?php echo ($vo['addtime']); ?></p>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>    
</div>
<?php if($page == 1): ?><span class="loading">
   <img class="fl" src="images/load.png" alt="aa" height="100%"> 
   <span id="gengduo">点击加载更多</span>
</span><?php endif; ?>
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
<script src="js/jquery-1.9.1.min.js"></script>
<script>

//加载更多信息
var p=2;
$("#gengduo").click(function(event) {
    var cate_id = "<?php echo ($_GET['cate_id']); ?>";
    $.ajax({
        url: "<?php echo U('Contact/news');?>",
        type: 'GET',
        dataType: 'json',
        data: {cate_id: cate_id,p:p},
        success: function(data, textStatus, xhr) {
          var tmp='';
          if (data.status==0) {
             $("#gengduo").text('没有更多信息');
             $(".loading").css("background-color","#cccccc");
             return false;
          };
          $.each(data.info, function(index, v) {
               tmp+='<div class="xxjl_cont underline "><div class="xxjl_img fl"><img src="'+v.icon+'" alt="aa" width="100%"></div><div class="xxjl_text fl"><p><a href="index.php?s=/Home/Contact/info/id/'+v.id+'">'+v.title+'</a></p><p>'+v.addtime+'</p></div></div>';
          });
          if (tmp) {
                $('#newlist').append(tmp);
          };
         p++;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
         
        }
    })
});


$(function () {
    var a = $('.rmq_t_ul li').width();
    $('.rmq_t_ul').css({
        width:a * 3 +40
    });
    $('.rmq_list ul').css({
        width:a * 3 +40
    });
});
    $(function () {
        moveNav()
    });
    function moveNav() {
        var navW   = $('.wd_ul li').width();
        var navL = $('.wd_ul li').length;
        $('.wd_ul').css({
            width: navW * navL
        })
    }
</script>