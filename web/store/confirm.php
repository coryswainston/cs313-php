<?php session_start(); ?>
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
      <h2>Your order is being processed.</h2>
      <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
          $cart = $_SESSION['cart'];
          echo "<table id=\"cart\">
          <tr>
            <th>Product name</th>
            <th>Price</th>
          </tr>";
          $total = 0;
          foreach ($cart as $id) {
            $name = $items[$id]['name'];
            $price = $items[$id]['price'];
            $total += $price;
            echo "<tr class=\"cart-item\">
              <td class=\"item-name\">$name</td>
              <td class=\"item-price\">$price</td>
              </tr>";
          }
          echo "<tr>
            <td class=\"total\">Total</td>
            <td class=\"total item-price\">$total</td>
          </tr>";
          echo "</table>";
        }
        $customer_name = htmlspecialchars($_POST['name']);
        $address = htmlspecialchars($_POST['address']);
        $city = htmlspecialchars($_POST['city']);
        $state = htmlspecialchars($_POST['state']);
       ?>
       <h3>Shipping to:</h3>
       <?php echo "$customer_name<br />$address<br />$city, $state"; ?>
    </main>
    <footer>
      <?php include 'footer.php'; ?>
    </footer>
  </body>
</html>
