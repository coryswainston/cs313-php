<?php

function get_db() {
  $dbUrl = getenv('DATABASE_URL');

  if (!isset($dbUrl) || empty($dbUrl)) {
    $dbHost = 'localhost';
    $dbPort = '5432';
    $dbUser = 'test';
    $dbPass = 'pass1234';
    $dbName = 'passwords';
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
