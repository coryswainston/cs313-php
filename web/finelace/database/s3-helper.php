<?php

function get_s3_client() {
  session_start();
  if ($_SESSION['login'] != 'admin') {
    die('Not authenticated');
  }

  require('../../../vendor/autoload.php');

  if (getenv(AWS_ACCESS_KEY_ID)) {
    $s3 = Aws\S3\S3Client::factory();
  } else {
    require 'local.php';
    $aws_key = get_local('AWS_ACCESS_KEY_ID');
    $aws_secret = get_local('AWS_SECRET_ACCESS_KEY');
    $s3 = Aws\S3\S3Client::factory(array('key' => $aws_key, 'secret' => $aws_secret));
  }

  return $s3;
}

?>
