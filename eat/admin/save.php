<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>
            保存
        </title>
    </head>
    <body>
        <?php
            session_start();  
            //检测是否登录，若没登录则转向登录界面  
            if(!isset($_SESSION['userid'])){  
            header("Location:Login.html"); 
            exit(); 
            } 
            require_once $_SERVER['DOCUMENT_ROOT'] . '../inc/db.php';
            $title = htmlentities($_POST['title']);
            $body= htmlentities($_POST['body']);
            $catalog= htmlentities($_POST['catalog']);
            $time = $_POST['time'];
            $sql = "INSERT INTO posts (title, body, time, catalog)VALUES('$title','$body','$time','$catalog')";
             $query = $db->prepare($sql);
            if(!$query->execute()){
                echo '<p>数据库插入错误</p>';  
            }else{
                echo '<script language="JavaScript">;alert("新增成功");location.href="./list.php?catalog=1";</script>;';
            };
        ?>
    </body>
</html>
