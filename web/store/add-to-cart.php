<?php
session_start();
if (isset($_POST["id"])) {
  for ($i = 0; $i < $_POST['quantity']; $i++) {
    if (isset($_SESSION['cart'])) {
      array_push($_SESSION['cart'], $_POST['id']);
    } else {
      $_SESSION['cart'] = array($_POST['id']);
    }
  }

  $idx = $_POST['id'];
  header("Location: item.php?idx=$idx&success=true");
}
?>
