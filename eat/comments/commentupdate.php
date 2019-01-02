<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>
            添加评论
        </title>
    </head>
    <body>
        <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '../inc/db.php';
            $id = $_POST['post_id'];
            $body  = htmlentities($_POST['body']);
            $time = $_POST['time'];
            $sql   = "INSERT INTO comments (post_id, body, created_at)VALUES('$id','$body','$time')";
            $query = $db->prepare($sql);
            if (!$query->execute()) {
                echo '<p>数据库插入错误</p>';
            } else {
        ?>
                <script language='JavaScript'>
                    alert('添加评论成功');
                    location.href='../posts/show.php?id=<?php echo $id; ?>';
                </script>
        <?php } ?>
    </body>
</html>
