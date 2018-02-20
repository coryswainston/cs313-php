<?php

function get_db() {
  $dbUrl = getenv('DATABASE_URL');

  if (!isset($dbUrl) || empty($dbUrl)) {
    require_once('local.php');
    $dbHost = 'localhost';
    $dbPort = '5432';
    $dbUser = get_local('DB_USERNAME');
    $dbPass = get_local('DB_PASSWORD');
    $dbName = 'postgres';
  }
  else {
    $dbopts = parse_url($dbUrl);

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPass = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"], '/');
  }
  try {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPass);
    return $db;
  }
  catch (PDOException $e) {
    echo "Unable to connect to the database.";
    die();
  }
}

 ?>
