<?php include 'items.php'; ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Store</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  </head>
  <body>
    <header>
      <?php include 'header.php'; ?>
    </header>
    <main>
      <?php
        $idx = $_GET['idx'];
        $item = $items[$idx];
        $photo_url = $item['photo_url'];
        $name = $item['name'];
        $price = $item['price'];
       ?>
       <div id="big_item">
         <div class="big_photo">
           <img alt="<?php echo $name?>" src="<?php echo $photo_url?>" />
         </div>
         <div class="big_info">
           <h3><?php echo $name ?></h3>
           <?php echo "\$$price" ?>
           <form action="cart.php" method="post">
             <input type="hidden" name="id" value="<?php echo $idx ?>">
             <input type="number" name="quantity" value="1">
             <button type="submit" name="add_to_cart">Add to cart</button>
           </form>
         </div>
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
