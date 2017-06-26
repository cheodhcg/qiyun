<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|后台数据管理平台</title>
    <link href="/qiyun/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/qiyun/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/qiyun/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/qiyun/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/qiyun/Public/Admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/qiyun/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/qiyun/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/qiyun/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/qiyun/Public/Admin/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo" style="color: #fff;font-size: 22px">企知道</span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                    <a class="item" href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
    <div class="main-title">
        <h2><?php echo ($meta_title); ?></h2>
    </div>
    <div class="tab-wrap">
        <ul class="tab-nav nav">
            <li data-tab="tab1" class="current"><a href="javascript:void(0);">申报表</a></li>
            <li data-tab="tab2" ><a href="javascript:void(0);">申请材料</a></li>
        </ul>
        <div class="tab-content">
            <div id="form_data">
                <div id="tab1" class="tab-pane in tab1">
                        <div class="form-item">
                            <label class="item-label">微信昵称<span class="check-tips"></span></label>
                            <div class="controls">
                                <input type="text" class="text input-large" name="nickname" value="<?php echo ($info['nickname']); ?>">
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="item-label">微信头像<span class="check-tips"></span></label>
                            <div class="controls">
                                <img src="<?php echo ($info['face']); ?>" width="200px;" height="200px;">
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="item-label">真实姓名<span class="check-tips"></span></label>
                            <div class="controls">
                                <input type="text" class="text input-large" name="username" value="<?php echo ($info['username']); ?>">
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="item-label">联系电话<span class="check-tips"></span></label>
                            <div class="controls">
                                <input type="text" class="text input-large" name="nickname" value="<?php echo ($info['phone']); ?>">
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="item-label">公司名称<span class="check-tips"></span></label>
                            <div class="controls">
                                <input type="text" class="text input-large" name="nickname" value="<?php echo ($info['company']); ?>">
                            </div>
                        </div><div class="form-item">
                        <label class="item-label">职位<span class="check-tips"></span></label>
                        <div class="controls">
                            <input type="text" class="text input-large" name="nickname" value="<?php echo ($info['position']); ?>">
                        </div>
                    </div>
                        <div class="form-item">
                            <label class="item-label">所在地区<span class="check-tips"></span></label>
                            <div class="controls">
                                <input type="text" class="text input-large" name="nickname" value="<?php echo ($info['area']); ?>">
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="item-label">擅长类型<span class="check-tips"></span></label>
                            <div class="controls">
                                <input type="text" class="text input-large" name="nickname" value="<?php echo ($info['excelled']); ?>">
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="item-label">个人简介<span class="check-tips"></span></label>
                            <div class="controls">
                                <input type="text" class="text input-large" name="nickname" value="<?php echo ($info['content']); ?>">
                            </div>
                        </div>
                </div>
                <div id="tab2" class="tab-pane tab2">
                    <p>暂时还没有内容哦</p>
                </div>
            </div>
        </div>
        <div class="form-item cf text-center" style="margin-top: 50px">
            <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
            <?php if(($info["is_pass"]) == "0"): ?><a href="<?php echo U('User/memberChecked?type=checked&id='.$info[id].'&status=1');?>" class="btn submit-btn confirm ajax-get " id="button1"  >通过</a>
                <a href="<?php echo U('User/memberChecked?type=checked&id='.$info[id].'&status=-1');?>" class="btn submit-btn confirm ajax-get" id="button2"  >不通过</a>
                <?php else: ?>
                <a href="javascript:return false;" onclick="return false;" class="btn submit-btn disabled">通过</a>
                <a href="javascript:return false;" onclick="return false;" class="btn submit-btn disabled">不通过</a><?php endif; ?>

            <a class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</a>
        </div>
    </div>


        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用后台数据管理平台</div>
                <div class="fr">V<?php echo (ONETHINK_VERSION); ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "/qiyun", //当前网站地址
            "APP"    : "/qiyun/admin.php?s=", //当前项目地址
            "PUBLIC" : "/qiyun/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/qiyun/Public/static/think.js"></script>
    <script type="text/javascript" src="/qiyun/Public/Admin/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/qiyun/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
    <script type="text/javascript" src="/qiyun/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
        //导航高亮
        highlight_subnav('<?php echo U('User/ProfessionalMembers');?>');
        var list = $('.tab-nav').children();
        var box = $('#form_data').children();
        list.click(function () {
            list.removeClass('current');
            box.removeClass('in');
            $(this).addClass('current');
            var tab = $(this).attr('data-tab');
            $('#'+tab).addClass('in');
        })
    </script>

</body>
</html>