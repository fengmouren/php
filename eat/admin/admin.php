<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>User</title>
	<style type="text/css">
		html{
          	font-family:"微软雅黑";
        }
		ul{
			list-style-type:none;
			margin:0;
			padding:0;
			overflow:hidden;
		}
		li{
			float:center;
		}
		a:link,a:visited{
			display:block;
			width:120px;
			font-weight:bold;
			color:#FFFFFF;
			background-color:#BDE61A;
			text-align:center;
			padding:4px;
			text-decoration:none;
			text-transform:uppercase;
		}
		a:hover,a:active{
			width:160px;
			padding:10px;
			background-color:#99AA55;
		}
	</style>
</head>
<body>
	<?php 
		session_start();  
   		//检测是否登录，若没登录则转向登录界面  
		if(!isset($_SESSION['userid'])){  
    		header("Location:Login.html"); 
    		exit(); 
		} 
		$userid = $_SESSION['userid'];  
		$username = $_SESSION['username'];  
	?>
	<div align="center">
		<ul>
			<li><a  href="../">首页</a></li>
			<li><a  href="list.php?catalog=1">编辑美食</a></li>
			<li><a  href="new.php">新增美食</a></li>
			<li><a  href="comment.php?post_id=-1">删除差评</a></li>
		</ul>
		<h1><?php echo '用户名：',$username; ?></h1>
		<h2><?php echo '用户ID：',$userid; ?></h2>
		<p><?php echo '<a href="login.php?action=logout">注销</a>';  ?></p>
	</div>

</body>
</html>