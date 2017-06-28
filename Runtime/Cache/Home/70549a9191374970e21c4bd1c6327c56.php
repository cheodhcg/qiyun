<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>我的讲座</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
</head>
<body>
<div class="wdtw_box oh" id="listdiv">
    <?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="wdtw_info container oh underline">
                <div>
                    <a href="<?php echo U('Lecture/lectureinfo',array('id'=>$vo['id']));?>"><p><?php echo ($vo['title']); ?></p></a>
                </div>
                <div class="my_tw_x fl">
                    <div class="my_hd_btn fl abs">
                        <?php if($vo['is_my']): ?><span class="my_cy dn">已参与</span>
                            <span class="my_fq ">已发起</span>
                            <?php else: ?>
                            <span class="my_cy">已参与</span>
                            <span class="my_fq dn">已发起</span><?php endif; ?>
                        <!-- <span>未开始</span> -->
                    </div>
                    <div class="my_tw_time fr abs my_hd">
                        发布时间
                        <span><?php echo ($vo["addtime"]); ?> </span>
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php else: ?>
        <div style="text-align: center;margin-top: 15%">
            <img src="/qiyun/images/暂无消息.png" alt="暂无消息">
            <p>暂时还没有内容哦~</p>
        </div>
        <div>
            <a href="<?php echo U('Lecture/lecture_release');?>" class="vip_btn">发起讲座</a>
        </div><?php endif; ?>

</div>
<?php if($page == 1): ?><span class="loading">
   <img class="fl" src="images/load.png" alt="aa" height="100%"> 
   <span id="gengduo">点击加载更多</span>
</span><?php endif; ?>
<script src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
    var p = 2;
    $("#gengduo").click(function(event) {
        $.ajax({
            url: "<?php echo U('User/myLecture');?>",
            type: 'GET',
            dataType: 'json',
            data: {p:p},
            success: function(data, textStatus, xhr) {
              var tmp='';
              if (data.status==0) {
                 $("#gengduo").text('没有更多信息');
                 $(".loading").css("background-color","#cccccc");
                 return false;
              };
              $.each(data.info, function(index, v) {
                if(v.is_my == 1){
                   tmp+='<div class="wdtw_info container oh underline"><div><p>'+v.title+'</p></div><div class="my_tw_x fl"><div class="my_hd_btn fl abs"><span class="my_cy dn">已参与</span><span class="my_fq ">已发起</span></div><div class="my_tw_time fr abs my_hd">发布时间<span>'+v.addtime+' </span></div></div></div>';
               }else{
                    tmp+='<div class="wdtw_info container oh underline"><div><p>'+v.title+'</p></div><div class="my_tw_x fl"><div class="my_hd_btn fl abs"><span class="my_cy">已参与</span><span class="my_fq dn">已发起</span></div><div class="my_tw_time fr abs my_hd">发布时间<span>'+v.addtime+' </span></div></div></div>';
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
<div class="f">
</div>
<div class="nav oh">
    <ul class="nav_ul">
        <a href="<?php echo U('Index/index?type=1');?>">
            <li align="center" <?php if($class == 1): ?>class="nav_a"<?php endif; ?>>
            <span>
                <?php if($class == 1): ?><img src="/qiyun/Public/Home/images/w_31_1.png" alt="aa" width="32" >
                    <?php else: ?>
                    <img src="/qiyun/Public/Home/images/w_31.png" alt="aa" width="32" ><?php endif; ?>

                </span>
                <span>问答</span>
            </li></a>
        <a href="<?php echo U('Lecture/index?type=2');?>" >
            <li align="center" <?php if($class == 2): ?>class="nav_a"<?php endif; ?>>
                <span>
                    <?php if($class == 2): ?><img src="/qiyun/Public/Home/images/w_19_1.png" alt="aa" width="32" >
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_19.png" alt="aa" width="32" ><?php endif; ?>
                </span>
                <span>微讲座</span>
            </li></a>
        <a href="<?php echo U('Shop/index?type=3');?>">
            <li align="center" <?php if($class == 3): ?>class="nav_a"<?php endif; ?>>
                <span>
                    <?php if($class == 3): ?><img src="/qiyun/Public/Home/images/w_21_1.png" alt="aa" width="32" >
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_21.png" alt="aa" width="32" ><?php endif; ?>
                </span>
                <span>商城</span>
            </li>
        </a>
        <a href="<?php echo U('Contact/index?type=4');?>" >
            <li align="center" <?php if($class == 4): ?>class="nav_a"<?php endif; ?>>
                <span>
                    <?php if($class == 4): ?><img src="/qiyun/Public/Home/images/w_23_1.png" alt="aa" width="32" align="absmiddle">
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_23.png" alt="aa" width="32" align="absmiddle"><?php endif; ?>

                </span>
                <span>人脉圈</span>
            </li></a>
        <a href="<?php echo U('User/index?type=5');?>" >
            <li align="center" <?php if($class == 5): ?>class="nav_a"<?php endif; ?>>
                <span>
                    <?php if($class == 5): ?><img src="/qiyun/Public/Home/images/w_25_1.png" alt="aa" width="32" >
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_25.png" alt="aa" width="32" ><?php endif; ?>

                </span><span>我的</span>
            </li>
        </a>
    </ul>
</div>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/swiper.min.js"></script>