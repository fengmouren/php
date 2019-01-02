<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>列表 - 吃天下</title>
  <style>
    .catalog ul,li{
            margin: 0px;
            padding: 1px;
            list-style: none;
        }
        .catalog ul{
            width:15%;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
        .catalog li{
          width:20%;
            border: 0px;
            text-align: center;
            margin-top: 4px;
            margin-bottom: 4px;
            flex:auto;  /*这是关键*/            
        }
        .catalog a{
          width: 95%;
          margin: 0px;
            padding: 0px;                 
        }
        a{
          text-decoration:none;
        }
  </style>
</head>

<body>
  <div align="center">
  <h1>吃天下</h1>
  <div class="catalog">
      <ul>
      <li><a href="?catalog=1">所有菜品</a></li>
        <?php 
          require_once'../inc/db.php';
          require_once'../inc/pager.php';
          $query = $db->prepare("select distinct catalog from posts");
            $query->execute();
          while($catalog=$query->fetchObject()){
            echo "<li><a href='?catalog=$catalog->catalog'>$catalog->catalog</a></li>";
          }
        ?>
        </ul>
      </div>
  <table border=1>
    <thead>
      <tr>
        <th>菜名</th>
        <th>创建日期</th>
        <th>操作</th>        
      </tr>
    </thead>
    <tbody>
      <?php
         if(!isset($_GET['page']))  $_GET['page']=1;
      if($_GET['catalog']==1)  $sql="select * from posts";
      else $sql="select * from posts "."where catalog=\"$_GET[catalog]\"";
        $page_arr=pager_query($sql,$nav_html,$_GET['page'],1);
        $query = $db->prepare($page_arr['sql']);
        $query->execute();
        while($row= $query->fetchObject()) {
          if($_GET['catalog']==1||$_GET['catalog']==$row->catalog){
      ?>
          <tr>
            <td><?php echo $row->title ?></td>
            <td><?php echo $row->time ?></td>
            <td>
              <a href="javascript:;" onclick="delete1(<?php echo $row->id ?>)">删</a>
              <a href="./edit.php?id=<?php echo $row->id ?>">改</a>
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
        location.href="delete.php?id="+aa+"&action=post";
      }
    }
  </script>
</body>
</html>
