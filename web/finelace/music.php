<?php require 'modules/header.php'; ?>

<?php require 'database/database.php'; ?>

<main>
<?php
$db = get_db();
foreach ($db->query('SELECT * FROM song') as $song) {
  $title = $song['songtitle'];
  $artist = $song['songartist'];
  $uri = $song['songuri'];

  echo "$title by $artist
  <br />
  <audio controls>
    <source src=\"$uri\" type=\"audio/mpeg\"/>
    Your browser does not support audio.
  </audio><br />";
}

if ($_SESSION['login'] == 'admin') {
  echo '<a href="new-song.php">Upload new song</a>';
}
?>

</main>

<?php require 'modules/footer.php'; ?>
