<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Fine Lace Music</title>
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
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
          <a href="blog.php">Blog</a>
        </li>
        <li>
          <a href="about.php">About</a>
        </li>
      </ul>
    </nav>
  </header>
