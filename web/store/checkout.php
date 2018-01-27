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
      <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $remove_idx = array_search($_POST['remove-id'], $_SESSION['cart']);
            unset($_SESSION['cart'][$remove_idx]);
          }
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
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
          echo "<p>
          Your cart is currently empty.
          </p>";
        }
       ?>
       <form class="address-form" method="post" action="confirm.php">
         <br />Please enter shipping info:<br />
         <input type="text" name="name" placeholder="Name"><br />
         <input type="text" name="address" placeholder="Street Address"><br />
         <input type="text" name="city" placeholder="City">
         <input type="text" name="state" placeholder="State">
         <button type="submit">Proceed with checkout</button>
         <a href="cart.php">Back to cart</a>
       </form>
    </main>
    <footer>
      <?php include 'footer.php'; ?>
    </footer>
  </body>
</html>
