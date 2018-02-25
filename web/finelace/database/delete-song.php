<?php
session_start();
require 'database.php';
require 's3-helper.php';

if ($_SESSION['login'] != 'admin') {
  header('Location: ../music.php');
}

$db = get_db();

$song_id = $_POST['song_id'];

$stmt = $db->prepare('SELECT songkey FROM song WHERE songid = :songid');
$stmt->bindValue(':songid', $song_id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$key = $row['songkey'];

$stmt = $db->prepare('DELETE FROM song WHERE songid = :songid');
$stmt->bindValue(':songid', $song_id, PDO::PARAM_INT);
$stmt->execute();

$bucket = get_bucket_name();
$s3 = get_s3_client();
$s3->deleteObject(array(
  'Bucket' => $bucket,
  'Key' => $key
));

header('Location: ../music.php');
 ?>
