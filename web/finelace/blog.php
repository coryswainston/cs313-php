<?php require 'modules/header.php'; ?>
<?php require 'database/database.php'; ?>

<main>
<?php
if ($_SESSION['login'] == 'admin') {
  echo '<a class="admin-button" href="new-post.php" class="new-post-link">+ Add new post</a>';
}

$db = get_db();
foreach ($db->query('SELECT post.*, siteuser.username AS author FROM post INNER JOIN siteuser ON post.postauthor=siteuser.userid') as $post) {
  $title = $post['posttitle'];
  $content = $post['postcontent'];
  $date = $post['postdate'];
  $author = $post['author'];
  $id = $post['postid'];

  echo "<h1>$title</h1>
  <h3>By $author</h3>
  <small>$date</small>
  <br />
  <p>
  $content
  </p>
  <br />";
  if ($_SESSION['login'] == 'admin') {
    echo "<div class=\"post-options\">
    <form action=\"database/delete-post.php\" method=\"POST\">
      <input type=\"hidden\" name=\"post_id\" value=\"$id\"/>
      <button class=\"admin-button red\" type=\"submit\">Delete Post</button>
    </form>
    <a class=\"admin-button\" href=\"edit-post.php?postid=$id\">Edit Post</a></div>";
  }
}
?>
</main>

<?php require 'modules/footer.php'; ?>
