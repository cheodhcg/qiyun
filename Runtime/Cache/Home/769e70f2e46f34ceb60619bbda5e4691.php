<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>问答</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
</head>
<body>
<div class="wd_title">
    <div class="wd_t_cont fl ">
        <ul class="wd_ul">
            <li><a href="<?php echo U('Index/index');?>"
                <?php if($type == 0): ?>class="wd_a"<?php endif; ?>
                >推荐</a></li>
            <?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/index',array('id'=>$v['id']));?>"
                    <?php if($type == $v['id']): ?>class="wd_a"<?php endif; ?>
                    ><?php echo ($v['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <span class="fr wd_t_cont_span ">
            <a href="<?php echo U('Index/question_release');?>" class="question-btn">
                <!--<img src="images/w_03.png" alt="aa" width="100%">-->
                <span style="">提问</span>
            </a>
        </span>
</div>
<div class="wd_cont " id="listdiv">
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="wd_c_box underline oh container">
            <a href="<?php echo U('Index/questioninfo?id='.$v['id']);?>">
                <p style="word-wrap:break-word"><?php echo ($v['content']); ?></p>
                <p><?php echo ($v['nickname']); ?>（<?php echo ($v['position']); ?>） | <?php echo ($v['area']); ?> <?php echo ($v['company']); ?></p>
            </a>
                <?php if($v['questionlist']): ?><div style="min-height: 58px">
                        <div class="wd_img_t fl">
                            <a href="<?php echo U('User/info?uid='.$v['uid']);?>">
                                <img src="<?php echo ($v['questionlist']['face']); ?>" alt="aa" width="100%">
                            </a>
                        </div>
                        <div class="wd_img_y fl">
                            <a href="<?php echo U('Index/questioninfo?id='.$v['id']);?>">
                            <img src="images/w_10.png" alt="aa" width="100%" align="bottom">
                            <span><?php echo ($v['questionlist']['money']); ?>元收听</span>
                            </a>
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
    $("#gengduo").click(function (event) {
        var id = "<?php echo ($_GET['id']); ?>";
        $.ajax({
            url: "<?php echo U('Index/index');?>",
            type: 'GET',
            dataType: 'json',
            data: {id: id, p: p},
            success: function (data, textStatus, xhr) {
                var tmp = '';
                if (data.status == 0) {
                    $("#gengduo").text('没有更多信息');
                    $(".loading").css("background-color", "#cccccc");
                    return false;
                }
                ;
                $.each(data.info, function (index, v) {
                    if (v.questionlist) {
                        tmp += '<div class="wd_c_box underline oh container"><p style="word-wrap:break-word"><a href="/index.php?s=/Home/Index/questioninfo/id/' + v.id + '">' + v.content + '</a></p><p>' + v.nickname + '（' + v.position + '）  |  ' + v.area + '   ' + v.company + '</p><div style=""><div class="wd_img_t fl"><img src="' + v.face + '" alt="" width="100%"></div><div class="wd_img_y fl"><img src="images/w_10.png" alt="aa" width="100%" align="bottom"><span>' + v.money + '元收听</span></div><div class="wd_t fr"><span>' + v.num + '</span>人听过</div></div></div>';
                    } else {
                        tmp += '<div class="wd_c_box underline oh container"><p style="word-wrap:break-word"><a href="/index.php?s=/Home/Index/questioninfo/id/' + v.id + '">' + v.content + '</a></p><p>' + v.nickname + '（' + v.position + '）  |  ' + v.area + '   ' + v.company + '</p></div>';
                    }
                });
                if (tmp) {
                    $('#listdiv').append(tmp);
                }
                ;
                p++;
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {

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