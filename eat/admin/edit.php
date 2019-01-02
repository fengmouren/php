<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>编辑</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/bootstrap-float-label.css">
	<link rel="stylesheet" type="text/css" href="../css/shijian.css"/>
	<style type="text/css">
		html{
          	font-family:"微软雅黑";
        }
		button {
			background-color:#BDE61A;
		}
		.body{
			width:40%; 
			height:60%;
			padding:20px;
			background-color:#FFFFFF;
			border-radius:30px 30px 30px 30px;
			box-shadow: 8px 8px  #BDE61A;
		}
		.jsbox{//时间控件样式
        	max-width: 500px;
        	text-align: left;
        	margin: 0 auto;
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
				
				$id    = $_GET['id'];
				$sql   = 'select * from posts where id = ' . $id;
				 $query = $db->prepare($sql);
            	$query->execute();
				$post  = $query->fetchObject();
			?>
			<h1>编辑美食</h1>

			<form action="update.php" method="post">
				<input type="hidden" name="id" value = "<?php echo $post->id; ?>"/>
				<label for="time">Time</label>
				<input type="text" name="time" id="timein" style="outline:none;border: 1px solid #BDE61A;text-align:center;border-radius:10px;color:#BDE61A" value="<?php echo date('Y-m-d H:i',strtotime($post->time)); ?>"/>
                <div class="jsbox"></div>
				<div class="form-group floating-control-group">
					<label for="txtFloatingUsername">Title</label>
					<input type="text" class="form-control" id="txtFloatingUsername" name="title" value="<?php echo $post->title; ?>" />
					</div>
				<div class="form-group floating-control-group">
					<label for="txtFloatingComments">Body</label>
					<textarea class="form-control" id="txtFloatingComments" rows="12" name="body" style="resize:none"><?php echo $post->body; ?></textarea>
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
			$('.form-group').floatingLabel()
		})
		//默认点击显示时间
    	$("#timein").shijian()
	</script>
</body>
</html>