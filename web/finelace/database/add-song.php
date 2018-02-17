<?php
require 'database.php';

$target_dir = "../music/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$song_uri = "music/" . basename($_FILES["fileToUpload"]["name"]);
echo $target_file;
echo $target_dir;
$audio_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

$db = get_db();

$title = htmlspecialchars($_POST['song_title']);
$artist = htmlspecialchars($_POST['song_artist']);

$stmt = $db->prepare('INSERT INTO song (songartist, songtitle, songuri) VALUES (:songartist, :songtitle, :songuri)');
$stmt->bindValue(':songtitle', $title);
$stmt->bindValue(':songartist', $artist);
$stmt->bindValue(':songuri', $song_uri);
$stmt->execute();

header('Location: ../music.php');
?>
