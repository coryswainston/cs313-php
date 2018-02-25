<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Fine Lace Music</title>
    <link rel="stylesheet" href="css/master.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Open+Sans|Satisfy" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=1927132944188097&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  <header>
    <div class="greeting">
      <?php
      if ($_SESSION['login'] != 'admin') {
        echo '<a href="login.php">Admin Login</a>';
      } else {
        echo 'Welcome, ' . $_SESSION['username'] . '. <a href="logout.php">Sign out</a>';
      }
       ?>
    </div>

    <h1>
      Fine Lace Music
    </h1>
    <nav>
      <ul>
        <li>
          <a href="index.php">Home</a>
        </li>
        <li>
          <a href="music.php">Music</a>
        </li>
        <li>
          <a href="videos.php">Videos</a>
        </li>
        <li>
          <a href="blog.php">Blog</a>
        </li>
        <li>
          <a href="follow.php">Follow</a>
        </li>
      </ul>
    </nav>
  </header>
