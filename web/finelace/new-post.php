<?php
require 'modules/header.php';
require 'database/database.php';

if ($_SESSION['login'] != 'admin') {
  header('Location: blog.php');
}
 ?>
<main>
  <h2>New Blog Post</h2>
  <form class="new-post" action="database/add-post.php" method="post">
    <label for="author">Author: </label>
    <input type="text" readonly name="author" value="<?php echo $_SESSION['username'] ?>"><br>
    <input type="text" name="title" placeholder="Name of this post"></input><br>
    <textarea name="content" rows="50" cols="80" placeholder="Write your post here..."></textarea>
    <button type="submit">Save Post</button>
  </form>
</main>
 <?php require 'modules/footer.php'; ?>
