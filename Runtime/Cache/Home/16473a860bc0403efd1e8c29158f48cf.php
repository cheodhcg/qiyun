<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>人脉圈</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
    <!--<link rel="stylesheet" href="css/swiper.min.css">-->
    <!--<script type="text/javascript" src="js/swiper.min.js"></script>-->


    <style>
        #overflow {
            /*border: 1px solid #000;*/
            overflow-x: scroll;
            overflow-y: hidden;
        }

        #overflow .container div {
            float: left;
        }

        #currentorders {
            max-height: 365px;
        }

    </style>
</head>
<body>
<div class="rmq_title oh">
    <ul class="rmq_t_ul">
        <li><a href="<?php echo U('Contact/index');?>" class="rmq_a">人脉</a></li>
        <li><a href="<?php echo U('Contact/news');?>">商机</a></li>
        <li><a href="<?php echo U('Contact/release_news');?>">发布</a></li>
        <a href="搜索.html" class="search_r">
            <img src="images/search.png" alt="aa" width="100%">
        </a>
    </ul>
    <div class="rmq_list container oh" align="center">
        <ul>
            <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('index?cate_id='.$v['id']);?>"
                    <?php if(($v['id']) == $cate_id): ?>class="rmq_a2"<?php endif; ?>
                    ><?php echo ($v['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>

    </div>
</div>

<div data-role="page" id="currentorders" style="margin-top: 100px;height: 365px;z-index: 99">
    <header data-role="header" data-position="fixed">
        <nav data-role="navbar">
            <div id="overflow">
                <div class="container" style="padding-top: 55px">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="rmq_person oh ">
                            <div class="card_img">
                                <img src="<?php echo ($vo['face']); ?>" alt="企知道头像" width="50" style="border-radius: 25px">
                            </div>
                            <div class="card-userinfo">
                                <h3 style="color: #ff827e;">
                                    <?php if(!empty($vo['username'])): echo ($vo['username']); ?>
                                        <?php else: ?>
                                        <?php echo ($vo['nickname']); endif; ?>

                                </h3>
                                <p><?php echo ($vo['position']); ?></p>
                            </div>
                            <div class="card-contact">
                                <p>
                                    Tel:<?php echo ($vo['phone']); ?>
                                </p>
                                <p>
                                    <?php echo ($vo['company']); ?>
                                </p>
                            </div>

                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </nav>

    </header>

</div>
</div>
<script src="js/jquery-1.9.1.min.js"></script>

<script>

    $(function () {
        var width = 0;
        var bh=$(window).height();//获取屏幕高度
        $('#overflow .container div.rmq_person').each(function () {
            width += $(this).width()+42;//42为margin和padding
        });
        $('#overflow .container').css("height",bh);
        $('#overflow .container').css('width', width + "px");
        $('html,body').addClass('ovfHiden');
    })

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