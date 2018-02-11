<?php require 'header.php'; ?>

<?php require 'database.php'; ?>

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
?>

</main>

<?php require 'footer.php'; ?>
