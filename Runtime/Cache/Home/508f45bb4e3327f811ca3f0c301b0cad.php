<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>商城</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <style>
        .sb_mc {
            width: 55%;
            display: block;
            color: #000 !important;
            word-break: break-all;
            text-overflow: ellipsis;
            display: -webkit-box; /** 对象作为伸缩盒子模型显示 **/
            -webkit-box-orient: vertical; /** 设置或检索伸缩盒对象的子元素的排列方式 **/
            -webkit-line-clamp: 1; /** 显示的行数 **/
            overflow: hidden; /** 隐藏超出的内容 **/
        }

        .sb_mc2 {
            width: 45%;
            display: block;
            word-break: break-all;
            text-overflow: ellipsis;
            display: -webkit-box; /** 对象作为伸缩盒子模型显示 **/
            -webkit-box-orient: vertical; /** 设置或检索伸缩盒对象的子元素的排列方式 **/
            -webkit-line-clamp: 1; /** 显示的行数 **/
            overflow: hidden; /** 隐藏超出的内容 **/
        }
        .sc-nav {
            overflow: hidden;
            padding: 15px 0;
        }
        .sc-nav ul{
            width: 100%;
        }
        .sc-nav ul li{
            width: 20%  ;
            text-align: center;
            float: left;
        }
    </style>
</head>
<body>
<div class="sc_banner">

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php if(is_array($bannerlist)): $i = 0; $__LIST__ = $bannerlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
                    <a href="<?php echo U('Shop/info',array('id'=>$v['id']));?>">
                        <img src="<?php echo (get_cover($v['cover_id'],'path')); ?>" alt="aa" width="100%" height="220">
                    </a>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination" style="bottom: 10px;"></div>
        <!-- Add Arrows -->
        <!--<div class="swiper-button-next"></div>-->
        <!--<div class="swiper-button-prev"></div>-->
    </div>
</div>
<div class="sc-nav">
    <ul>
        <li><a href="<?php echo U('Shop/index');?>"><img src="images/sc01.png" alt="i" width="80%"> <br>服务</a></li>
        <li><a href="javascript:void (0);" onclick="alert1()"><img src="images/sc02.png" alt="i" width="80%"> <br>房产</a></li>
        <li><a href="javascript:void (0);" onclick="alert1()"><img src="images/sc03.png" alt="i" width="80%"> <br>律师</a></li>
        <li><a href="javascript:void (0);" onclick="alert1()"><img src="images/sc04.png" alt="i" width="80%"> <br>咨询</a></li>
        <li><a href="javascript:void (0);" onclick="alert1()"><img src="images/sc05.png" alt="i" width="80%"> <br>商务</a></li>
    </ul>
</div>
<script>
    function alert1() {
        alert("敬请期待");
    }
</script>
<div class="sc_list  oh" id="listdiv">
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="sc_list_info fl oh">
            <!--<a href="<?php echo U('info?id='.$vo['id']);?>">-->
            <a href="<?php echo U('WxJsApi/buyMember?id='.$vo['id']);?>">
                <img src="/qiyun<?php echo ($vo["path"]); ?>" alt="aa" width="100%" height="96">
                <p><span class="sb_mc fl"><?php echo ($vo["title"]); ?></span><span class="fr sb_mc2" style="text-align: right">￥<?php echo ($vo["money"]); ?></span>
                </p>
            </a>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>

</div>
<?php if($page == 1): ?><span class="loading">
   <img class="fl" src="images/load.png" alt="aa" height="100%"> 
   <span id="gengduo">点击加载更多</span>
</span><?php endif; ?>
<div class="nav oh">
    <ul class="nav_ul">
        <a href="<?php echo U('Index/index?type=1');?>">
            <li align="center" <?php if($class == 1): ?>class="nav_a"<?php endif; ?>>
            <span>
                <?php if($class == 1): ?><img src="/qiyun/Public/Home/images/w_31_1.png" alt="aa" width="" >
                    <?php else: ?>
                    <img src="/qiyun/Public/Home/images/w_31.png" alt="aa" width="" ><?php endif; ?>

                </span>
            <span>问答</span>
            </li></a>
        <a href="<?php echo U('Lecture/index?type=2');?>" >
            <li align="center" <?php if($class == 2): ?>class="nav_a"<?php endif; ?>>
            <span>
                    <?php if($class == 2): ?><img src="/qiyun/Public/Home/images/w_19_1.png" alt="aa" width="" >
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_19.png" alt="aa" width="" ><?php endif; ?>
                </span>
            <span>微讲座</span>
            </li></a>
        <a href="<?php echo U('Shop/index?type=3');?>">
            <li align="center" <?php if($class == 3): ?>class="nav_a"<?php endif; ?>>
            <span>
                    <?php if($class == 3): ?><img src="/qiyun/Public/Home/images/w_21_1.png" alt="aa" width="" >
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_21.png" alt="aa" width="" ><?php endif; ?>
                </span>
            <span>商城</span>
            </li>
        </a>
        <a href="<?php echo U('Contact/index?type=4');?>" >
            <li align="center" <?php if($class == 4): ?>class="nav_a"<?php endif; ?>>
            <span>
                    <?php if($class == 4): ?><img src="/qiyun/Public/Home/images/w_23_1.png" alt="aa" width="" align="absmiddle">
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_23.png" alt="aa" width="" align="absmiddle"><?php endif; ?>

                </span>
            <span>人脉圈</span>
            </li></a>
        <a href="<?php echo U('User/index?type=5');?>" >
            <li align="center" <?php if($class == 5): ?>class="nav_a"<?php endif; ?>>
            <span>
                    <?php if($class == 5): ?><img src="/qiyun/Public/Home/images/w_25_1.png" alt="aa" width="" >
                        <?php else: ?>
                        <img src="/qiyun/Public/Home/images/w_25.png" alt="aa" width="" ><?php endif; ?>

                </span><span>我的</span>
            </li>
        </a>
    </ul>
</div>
<script src="/qiyun/Public/Home/js/jquery-1.9.1.min.js"></script>
<script src="/qiyun/Public/Home/js/bootstrap.min.js"></script>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/swiper.min.js"></script>

<script>
    var p = 2;
    $("#gengduo").click(function (event) {
        $.ajax({
            url: "<?php echo U('Shop/index');?>",
            type: 'GET',
            dataType: 'json',
            data: {p: p},
            success: function (data, textStatus, xhr) {
                var tmp = '';
                if (data.status == 0) {
                    $("#gengduo").text('没有更多信息');
                    $(".loading").css("background-color", "#cccccc");
                    return false;
                }
                ;
                $.each(data.info, function (index, v) {
                    tmp += '<div class="sc_list_info fl oh"><a href="index.php?s=/Home/Shop/info/id/' + v.id + '"><img src="' + v.path + '" alt="aa" width="100%"><p><span class="sb_mc fl">' + v.title + '</span><span class="fr sb_mc2" style="text-align: right">￥' + v.money + '</span></p></a></div>';
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
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: 2500,
        autoplayDisableOnInteraction: false
    });

</script>