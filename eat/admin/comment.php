<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Comment</title>
<style>
	.post_id ul,li{
            margin: 0px;
            padding: 1px;
            list-style: none;
        }
        .post_id ul{
            width:5%;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
        .post_id li{
          width:5%;
            border: 0px;
            text-align: center;
            margin-top: 4px;
            margin-bottom: 4px;
            flex:auto;  /*这是关键*/            
        }
        .post_id a{
          width: 75%;
          margin: 0px;
          padding: 0px;                 
        }
        a{
          text-decoration:none;
        }
</style>
</head>
<?php
session_start();
if(!isset($_SESSION['userid'])){
	exit("非法访问！");
}
?>
<body>
<div align="center">
  <h1>评论列表</h1>
  <div class="post_id">
      <ul>
      <li><a href="?post_id=-1">all</a></li>
        <?php 
          require_once'../inc/db.php';
          require_once'../inc/pager.php';
          $query = $db->prepare("select distinct post_id from comments");
            $query->execute();
          while($comment=$query->fetchObject()){
            echo "<li><a href='?post_id=$comment->post_id'>$comment->post_id</a></li>";
          }
        ?>
        </ul>
      </div>
  <table border=1>
    <thead>
      <tr>
        <th>帖子id</th>
        <th>内容</th>
        <th>创建日期</th>
        <th>操作</th>        
      </tr>
    </thead>
    <tbody>
      <?php
         if(!isset($_GET['page']))  $_GET['page']=1;
      if($_GET['post_id']==-1)  $sql="select * from comments order by post_id";
      else $sql="select * from comments "."where post_id=\"$_GET[post_id]\"";
        $page_arr=pager_query($sql,$nav_html,$_GET['page'],3);
        $query = $db->prepare($page_arr['sql']);
            $query->execute();
        while($row= $query->fetchObject()) {
          if($_GET['post_id']==-1||$_GET['post_id']==$row->post_id){
      ?>
          <tr>
            <td><?php echo $row->post_id ?></td>
            <td><?php echo $row->body ?></td>
            <td><?php echo $row->created_at ?></td>
            <td>
              <a href="javascript:;" onclick="delete1(<?php echo $row->id ?>)">删</a>
            </td>
          </tr> 
        <?php }} ?>
    </tbody>
  </table>
    <?php echo $page_arr['nav_html'] ?>
  <a href="./admin.php">返回Home</a>
</div>
  <script>
    function delete1(aa){
      event.preventDefault();
      if(confirm("确认删除？")){
        var str=aa;
        location.href="delete.php?id="+aa+"&action=comment";
      }
    }
  </script>
</body>
</html>