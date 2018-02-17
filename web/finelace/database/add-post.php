<?php
session_start();
require 'database.php';

if ($_SESSION['login'] != 'admin') {
  header('Location: ../blog.php');
}

$db = get_db();

$title = htmlspecialchars($_POST['title']);
$content = htmlspecialchars($_POST['content']);

$stmt = $db->prepare('INSERT INTO post VALUES (DEFAULT, :title, :content, NULL, current_date, :author)');
$stmt->bindValue(':content', $content);
$stmt->bindValue(':title', $title);
$stmt->bindValue(':author', $_SESSION['userid']);
$stmt->execute();

header('Location: ../blog.php');
 ?>
