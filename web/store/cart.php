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
          $cart = $_SESSION['cart'];
          echo "<table id=\"cart\">
          <tr>
            <th>Product name</th>
            <th>Price</th>
            <th>
            </th>
          </tr>";
          $total = 0;
          foreach ($cart as $id) {
            $name = $items[$id]['name'];
            $price = $items[$id]['price'];
            $total += $price;
            echo "<tr class=\"cart-item\">
              <td class=\"item-name\">$name</td>
              <td class=\"item-price\">$price</td>
              <td class=\"remove\">
              <form action=\"remove-from-cart.php\" method=\"post\">
                <input type=\"hidden\" name=\"remove-id\" value=\"$id\" />
                <button type=\"submit\">Remove</button>
              </form>
              </td></tr>";
          }
          echo "<tr>
            <td class=\"total\">Total</td>
            <td class=\"total item-price\">$total</td>
            <td>
            </td>
          </tr>";
          echo "</table>";
          echo "<br /><a href=\"checkout.php\" class=\"big-link\">Checkout</a>";
        }
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
          echo "<p>
          Your cart is currently empty.
          </p>";
        }
       ?>
    </main>
    <footer>
      <?php include 'footer.php'; ?>
    </footer>
  </body>
</html>
