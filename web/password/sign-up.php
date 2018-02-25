<?php require 'header.php'; ?>

<?php
require 'database.php';
$db = get_db();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['email'];
  $password = $_POST['password'];

  $hash = password_hash($password, PASSWORD_BCRYPT);

  $stmt = $db->prepare('INSERT INTO siteuser VALUES (DEFAULT, :username, :password)');
  $stmt->bindValue(':username', $username);
  $stmt->bindValue(':password', $hash);
  $stmt->execute();

  header('Location: login.php');
}
 ?>

<main>
  <h2>Create an Account</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="email" name="email" placeholder="email"><br>
    <input type="password" name="password" placeholder="password"><br>
    <button type="submit" name="submit">Submit</button><br>
  </form>
</main>

<?php require 'footer.php'; ?>
