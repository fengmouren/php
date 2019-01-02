<!DOCTYPE html>
<html lang="cn">
  <head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/zd-1.0.css">
	<script src="./js/jquery.min.js"></script>
	<script src="./js/jPicture.min.js"></script>
	<style>
		#wrapper{
			margin:0 auto;
			border-radius:30px 30px 30px 30px;
		}
	</style>
  </head>
  <body>
	<nav>
		<!-- logo -->
		<div class="nav-logo">
			<a href="###">吃天下</a>
		</div>

		<!-- 控制menu -->
		<div class="nav-menu">
			<span></span>
			<span></span>
			<span></span>
		</div>

		<!-- 菜单 -->
		<ul class="nav-list">
			<li><a href="">首页</a></li>
			<li><a href="./posts/index.php?catalog=1">美食</a></li>		
			<li><a href="../admin/admin.php">管理员</a></li>
		</ul>
	</nav>
	<br>
	<br>
	<br>
    <script>
		    $(function () {

		        $("#wrapper").jPicture([
		            { src: "./img/img_1.jpg"},
		            { src: "./img/img_2.jpg"},
		            { src: "./img/img_3.jpg"},
		            { src: "./img/img_4.jpg"}
		        ], {
		            effect: "slide",   // 可选, 图片切换方式, slide(默认左右滑动), fade(淡入淡出), show(直接显示)
		            dotAlign: "center", // 可选, 下方切换按钮的对齐方式, center(默认居中), left(居左), right(居右)
		            dotShape: "line",  // 可选, 下方切换按钮的形状, circle(默认圆点), square(方框), line(线形)     
		            autoplay: 4000,    // 可选, 自动切换时间间隔, 单位：ms, 默认: 5000, 设置为 false 则不进行自动切换
		            useTransform: true,// 可选, 针对 slide 切换方式, 是否使用 transform 形式, 默认：false
		            duration: 1200,    // 可选, 切换动画的过渡时间, 单位：ms, 默认：750, 只对 slide 和 fade 生效
		            width: 800,
		            height: 500
		        });
		    })
	</script>
	<div id="wrapper"></div>
    
  </body>
  <script>
		$(document).click(function(){
			$('.nav-list').removeClass('open')
		})
		$('.nav-menu,.nav-list').click(function(e){e.stopPropagation()})
		$('nav').find('.nav-menu').click(function(e){
			$('.nav-list').toggleClass('open')
		})
	</script>
</html>