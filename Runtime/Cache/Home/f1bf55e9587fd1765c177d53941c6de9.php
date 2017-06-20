<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>操作提示</title>
<link rel="stylesheet" href="css/common.css">
	<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
.system-message{ padding: 24px 48px; }
.system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
.system-message .jump{ padding-top: 10px}
.system-message .jump a{ color: #333;}
.system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px }
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
</style>
	<style>
		body{
			background: #fff;
		}

		.affirm-con span {
			display: block;
			width: 100%;
			color: green;
			height: 40px;
			line-height: 21px;
			font-size: 25px;
			vertical-align: middle;
			text-align: center;
			margin-top: 30px;
		}
		.affirm-con span>img{
			height: 40px;
			width: 40px;
			margin:0 10px 0 15px;
			vertical-align: middle;
		}
		.affirm-con p{
			margin-top: 10px;
			line-height: 20px;
			color: #ccc;
		}
		.dn{
			display: none;
		}
	</style>
</head>
<body>
<div class="top-all">
	<h1 class="container" style="text-align:center; background:#0076c2;height:30px;line-height:30px;font-size:18px; color:#fff;">
	操作提示
	</h1>
</div>


<div class="" style="margin-top: 0">
	<?php if(isset($message)) {?>
		<div class="affirm-con ">
			<span class="fl" style=""><img src="images/z-d_03.jpg" alt="" width="21" height="21"><?php echo($message); ?></span>
			<p class="fl" style=""></p>
		</div>
	<?php }else{?>
		<div class="affirm-con container  ">
			<span class="fl" style="color: red" ><img src="images/wwc_03.jpg" alt="" width="21" height="21"><?php echo($error); ?></span>
		</div>
	<?php }?>
</div>

<p class="detail"></p>

<p class="jump" style="display:none;">
页面自动<a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
</p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>