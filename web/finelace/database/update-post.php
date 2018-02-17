<?php
session_start();
require 'database.php';

if ($_SESSION['login'] != 'admin') {
  header('Location: ../blog.php');
}

$db = get_db();

$title = $_POST['title'];
$content = $_POST['content'];
$post_id = $_POST['post_id'];

$stmt = $db->prepare('UPDATE post SET posttitle=:title, postcontent=:content WHERE postid = :postid');
$stmt->bindValue(':content', $content);
$stmt->bindValue(':title', $title);
$stmt->bindValue(':postid', $post_id);
$stmt->execute();

header('Location: ../blog.php');
 ?>
