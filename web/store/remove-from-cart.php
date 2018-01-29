<?php
session_start();

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $remove_idx = array_search($_POST['remove-id'], $_SESSION['cart']);
    unset($_SESSION['cart'][$remove_idx]);
  }
}

header("Location: cart.php");
?>
