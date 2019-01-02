<?php
session_start();
if((!isset($_SESSION['userid']))||(!isset($_GET['action']))){
	exit("非法访问！");
}
require_once $_SERVER['DOCUMENT_ROOT'].'./inc/db.php';
if($_GET['action']=="post"){
	$query=$db->prepare("delete from posts where id = {$_GET['id']}");
	if(!$query->execute()){
		echo '<p>数据库删除错误</p>';	
	}else{
		$query=$db->prepare("delete from comments where post_id = {$_GET['id']}");
		if(!$query->execute()){
			echo '<p>数据库删除错误</p>';	
		}else{
			header("Location:./list.php?catalog=1");
		}
	}
}else if($_GET['action']=="comment"){
	$query=$db->prepare("delete from comments where id = {$_GET['id']}");
	if(!$query->execute()){
		echo '<p>数据库删除错误</p>';	
	}else{
		header("Location:./comment.php?post_id=-1");
	}
}else exit("没有此页面！");
?>