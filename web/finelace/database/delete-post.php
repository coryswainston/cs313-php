<?php
session_start();
require 'database.php';

if ($_SESSION['login'] != 'admin') {
  header('Location: ../blog.php');
}

$db = get_db();

$post_id = $_POST['post_id'];
echo $post_id;

$stmt = $db->prepare('DELETE FROM post WHERE postid = :postid');
$stmt->bindValue(':postid', $post_id, PDO::PARAM_INT);
$stmt->execute();

header('Location: ../blog.php');
 ?>
