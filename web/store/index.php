<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crocs 'n' Socks</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  </head>
  <body>
    <header>
      <?php include 'header.php'; ?>
    </header>
    <main>
      <h2>Welcome to Crocs 'n' Socks</h2>
      <p>
        Get some socks with your Crocs. (Sorry this isn't a real store)
      </p>
      <div id="display-img">
        <img alt="Crocos and Sockitos" src="images/display.jpg" />
        <a class="big-link" href="shop.php">Shop Now</a>
      </div>
    </main>
    <div id="sidebar">
      <?php include 'sidebar.php'; ?>
    </div>
    <footer>
      <?php include 'footer.php'; ?>
    </footer>
  </body>
</html>
