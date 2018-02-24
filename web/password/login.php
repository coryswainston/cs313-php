<?php
session_start();

require 'header.php';
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['email'];
  $password = $_POST['password'];

  $db = get_db();
  foreach ($db->query('SELECT * FROM siteuser') as $row) {
    $db_user = $row['username'];
    $db_pass = $row['password'];

    if (password_verify($password, $db_pass)) {
      $_SESSION['username'] = $username;
      header('Location: index.php');
    } else {
      header('Location: login.php?success=false');
    }
  }
}

?>
<main>
  <h2>Sign In</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="email" name="email" placeholder="email"><br>
    <input type="password" name="password" placeholder="password"><br>
    <button type="submit" name="submit">Submit</button><br>
    <?php if ($_GET['success'] == 'false') {
      echo "Username or password not recognized";
    } ?>
  </form>
</main>

<?php require 'footer.php'; ?>
