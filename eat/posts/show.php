<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>内容 | 吃天下</title>
</head>
<body>
  <?php 
  require_once $_SERVER['DOCUMENT_ROOT'] . '../inc/db.php';       
    $id = $_GET['id'];
    $sql = 'select * from posts where id = :id';
    $query = $db->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();
  ?>
  <div align="center">
  <h1><?php echo $post->title ?>  </h1>
  <p><?php echo $post->body ?></p>
 
    <h2>添加评论</h2>
    <form action="../comments/commentupdate.php" method="post">
        <input type="hidden" name="post_id" value = "<?php echo $id; ?>"/>
        <input type="hidden" name="time" value = "<?php echo date('Y-m-d H:i:s',time()); ?>"/>
        <br>
        <textarea rows="4" name="body" style="resize:none"></textarea>
        <br>
        <input type="submit" value="提交"/>
    </form>
    <ul>
        <?php         
            $query = $db->prepare("select * from comments where post_id = :id");
            $query->bindValue(':id',$id,PDO::PARAM_INT);
            $query->execute();
            while($row = $query->fetchObject()){
        ?>
        <li>
            <p><?php echo $row->body;?></p>
            <span><?php echo $row->created_at;?></span>
        </li>
        <br>
        <?php } ?>
    </ul>
    <a href="./index.php?catalog=<?php echo $post->catalog; ?>">返回上层</a>
    <a href="../">返回首页</a>
</div>
</body>
</html>