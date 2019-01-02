<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>新增</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/bootstrap-float-label.css">
	<link rel="stylesheet" type="text/css" href="../css/shijian.css"/>
	<style type="text/css">
		html{
          	font-family:"微软雅黑";
        }
		.body{
			/*border:4px solid #006666; */
			width:40%; 
			height:60%;
			padding:20px;
			background-color:#FFFFFF;
			border-radius:30px 30px 30px 30px;
			box-shadow: 8px 8px  #BDE61A;
		}
		h1{
			letter-spacing:4px;
		}
		a:link,a:visited{
			color:#BDE61A;
			text-decoration:line-through;
		}
		a:hover,a:active{
			color:#28a745;
		}
	</style>
</head>
<body>
	<div align="center">
		<div class="body">
			<?php
			session_start();  
	   		//检测是否登录，若没登录则转向登录界面  
			if(!isset($_SESSION['userid'])){  
	    		header("Location:Login.html"); 
	    		exit(); 
			} 
			require_once $_SERVER['DOCUMENT_ROOT'] . '../inc/db.php';
			?>
			<h1>新增美食</h1>

			<form action="save.php" method="post">
				<label for="time">Time</label>
				<input type="text" name="time" id="timein" value="<?php echo date('Y-m-d H:i',time()); ?>" style="outline:none;border: 1px solid #BDE61A;text-align:center;border-radius:10px;color:#BDE61A"/>
                <div class="jsbox"></div>
				<div class="form-group floating-control-group">
				<label for="txtFloatingUsername">Title</label>
				<input type="text" class="form-control" id="txtFloatingUsername" name="title"/>
				</div>
				<div class="form-group floating-control-group">
				<label>标签</label>
				<input type="text" class="form-control" name="catalog"/>
				</div>
				<div class="form-group floating-control-group">
				<label for="txtFloatingComments">Body</label>
				<textarea class="form-control" id="txtFloatingComments" rows="12" name="body" style="resize:none"></textarea>
				</div>
				<button type="submit" class="btn btn-primary"> 提 交 </button>
			</form>
			<a href="javascript:history.back(-1);">取消</a>
		</div>
	</div>
	<script src="../js/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="../js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap-float-label.js"></script>
	<script src="../js/jquer_shijian.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(function(){
			$('.form-group').floatingLabel();
		})
		//默认点击显示时间
    	$("#timein").shijian()
	</script>
</body>
</html>