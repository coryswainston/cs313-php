<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Results</title>
  </head>
  <body>
    Name: <?php echo $_POST["name"]; ?> <br />
    Email: <a href="mailto:<?=$_POST['email']?>"><?=$_POST["email"]?></a><br />
    Major: <?=$_POST["major"]?><br />
    Comments: <br />
    <p>
      <?=$_POST["comments"]?>
    </p>
    <?php foreach ($_POST["continents"] as $continent)
    {
      echo "You have visited $continent!<br />";
    }
    ?>
  </body>
</html>
