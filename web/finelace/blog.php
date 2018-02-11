<?php require 'header.php'; ?>
<?php require 'database.php'; ?>

<main>
<?php
$db = get_db();
foreach ($db->query('SELECT post.*, siteuser.username AS author FROM post INNER JOIN siteuser ON post.postauthor=siteuser.userid') as $post) {
  $title = $post['posttitle'];
  $content = $post['postcontent'];
  $date = $post['postdate'];
  $author = $post['author'];

  echo "<h1>$title</h1>
  <h3>By $author</h3>
  <small>$date</small>
  <br />
  <p>
  $content
  </p>";
}

 ?>
</main>

<?php require 'footer.php'; ?>
