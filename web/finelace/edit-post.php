<?php
require 'modules/header.php';
require 'database/database.php';

if ($_SESSION['login'] != 'admin') {
  header('Location: blog.php');
}

$db = get_db();

$post_id = $_GET['postid'];

$stmt = $db->prepare('SELECT * FROM post WHERE postid=:postid');
$stmt->bindValue(':postid', $post_id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$title = $row['posttitle'];
$content = $row['postcontent'];
 ?>
<main>
  <h2>Edit Blog Post</h2>
  <form class="edit-post" action="database/update-post.php" method="post">
    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
    <label for="author">Author: </label>
    <input type="text" readonly name="author" value="<?php echo $_SESSION['username']; ?>"><br>
    <input type="text" name="title" value="<?php echo $title; ?>"></input><br>
    <textarea name="content" rows="50" cols="80"><?php echo $content; ?></textarea>
    <button class="admin-button" type="submit">Save Post</button>
  </form>
</main>
 <?php require 'modules/footer.php'; ?>
