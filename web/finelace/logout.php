<?php

session_start();
$_SESSION['login'] = NULL;
$_SESSION['username'] = NULL;
$_SESSION['userid'] = NULL;

header('Location: index.php');

 ?>
