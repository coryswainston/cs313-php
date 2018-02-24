<?php
session_start();

require 'database.php';
require 's3-helper.php';

if ($_SESSION['login'] != 'admin') {
  header('Location: ../music.php');
}

$s3 = get_s3_client();
$bucket = get_bucket_name();
$key = $_FILES['fileToUpload']['name'];
try {
  $upload = $s3->upload($bucket, $_FILES['fileToUpload']['name'], fopen($_FILES['fileToUpload']['tmp_name'], 'rb'), 'public-read');
  $song_uri = $s3->getObjectUrl($bucket, $key);
} catch (Exception $e) {
  $prev = $e->getPrevious();
  if (isset($prev)) {
    $mes = $prev->getMessage();
  }
  die('Error uploading file: ' . $e->getMessage() . ' ' . $e->getTraceAsString() . ' ' . $mes);
}

$db = get_db();

$title = htmlspecialchars($_POST['song_title']);
$artist = htmlspecialchars($_POST['song_artist']);

$stmt = $db->prepare('INSERT INTO song (songartist, songtitle, songuri, songkey, albumid) VALUES (:songartist, :songtitle, :songuri, :songkey, 4)');
$stmt->bindValue(':songtitle', $title);
$stmt->bindValue(':songartist', $artist);
$stmt->bindValue(':songuri', $song_uri);
$stmt->bindValue(':songkey', $key);
$stmt->execute();

header('Location: ../music.php');
?>
