<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>
           登陆
        </title>
        <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
        <style type="text/css">
        html{
            font-family:"微软雅黑";
        }
		a:link,a:visited{
			display:block;
			width:320px;
			font-weight:bold;
			color:#FFFFFF;
			background-color:#44BB8C;
			text-align:center;
			padding:6px;
			text-decoration:none;
			text-transform:uppercase;
		}
		a:hover,a:active{
			width:360px;
			padding:10px;
			background-color:#006666;
		}
	</style>
    </head>
    <body>
    	<?php

//登录

if (!($_GET['action']=="logout"||isset($_POST['submit1']))) {

    exit('非法访问!');

}
if(isset($_POST['submit1'])){

$username = htmlspecialchars($_POST['username']);

$password = $_POST['password'];

//包含数据库连接文件

require_once $_SERVER['DOCUMENT_ROOT'].'./inc/db.php';

//检测用户名及密码是否正确

$query = $db->prepare("select id from admin where name='$username' and password='$password' limit 1");
            $query->execute();
if ($row = $query->fetchObject()) {

    //登录成功

    session_start();

    $_SESSION['username'] = $username;

    $_SESSION['userid'] = $row->id;
    
    echo '<div align="center">',$username, '欢迎你！进入 <a href="admin.php">管理中心</a><br />';

    echo '点击此处 <a href="Login.php?action=logout">注销 登录！</a><br /></div>';

    exit;

} else {

    exit('<div align="center">登录失败！点击此处 <a href="javascript:history.back(-1);">返回重试</a></div>');

}
}

//注销登录

if ($_GET['action'] == "logout") {

	session_start();

    unset($_SESSION['userid']);

    unset($_SESSION['username']);

    echo '<div align="center">注销登录成功！点击此处 <a href="Login.html">登录</a><br>';

    echo '点击此处返回<a href="../index.php">首页</a></div>';

    exit;

}

?>
    </body>
</html>
