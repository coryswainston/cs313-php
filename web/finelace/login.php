<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login | Fine Lace Music</title>
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>

   <main>
     <?php
     function finish_login() {
       header('Location: index.php');
     }

     if ($_SESSION['login'] == 'admin') {
       finish_login();
     }

     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       require 'database/database.php';

       $success = false;

       $email = $_POST['email'];
       $password = $_POST['password'];

       $db = get_db();
       $stmt = $db->prepare('SELECT * FROM siteuser WHERE useremail=:email');
       $stmt->bindValue(':email', $email);
       $stmt->execute();
       $user = $stmt->fetch(PDO::FETCH_ASSOC);

       $hash = $user['userpassword'];
       if (password_verify($password, $hash)) {
         $success = true;
       }

       if (!$success) {
         header('Location: login.php?success=false');
       }
       else {
         $_SESSION['login'] = "admin";
         $_SESSION['username'] = $user['username'];
         $_SESSION['userid'] = $user['userid'];
         finish_login();
       }
     }
     ?>
     <div class="login-form">
       <h2>Admin Login</h2>
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <input type="email" name="email" placeholder="Email"><br>
         <input type="password" name="password" placeholder="Password"><br>
         <?php if ($_GET['success'] === 'false') {
           echo "Username or password not recognized. Try again.<br /><br />";
         } ?>
         <button type="submit" name="login">Login</button>
       </form>
     </div>
   </main>
  </body>
</html>
