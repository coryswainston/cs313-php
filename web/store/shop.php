<?php include 'items.php'; ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop for items</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  </head>
  <body>
    <header>
      <?php include 'header.php'; ?>
    </header>
    <main>
      <div id="items">
        <?php
        foreach ($items as $idx => $item) {
            $name = $item['name'];
            $price = $item['price'];
            $photo_url = $item['photo_url'];
            $id = "item" . $idx;
            echo "<form id=\"$id\" method=\"get\" action=\"item.php\">
                <input type=\"hidden\" name=\"idx\" value=\"$idx\" />
              </form>
              <div class=\"item\" onclick=\"document.getElementById('$id').submit()\">
              <div class=\"photo\">
                <img alt=\"$name\" src=\"$photo_url\" />
              </div>
              <div class=\"product-info\">
                $name<br />
                \$$price
              </div>
            </div>";
          }
         ?>
      </div>
    </main>
    <footer>
      <?php include 'footer.php'; ?>
    </footer>
  </body>
</html>
