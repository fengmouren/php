<?php
try {
    $db = new PDO('mysql:dbname=eat;host=127.0.0.1;charset=utf8', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
	exit;
}
?>