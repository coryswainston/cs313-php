<?php

function get_s3_client() {
  if ($_SESSION['login'] != 'admin') {
    die('Not authenticated');
  }

  require('../../../vendor/autoload.php');

  if (getenv('AWS_ACCESS_KEY_ID')) {
    $aws_key = getenv('AWS_ACCESS_KEY_ID');
    $aws_secret = getenv('AWS_SECRET_ACCESS_KEY');
  } else {
    require_once('local.php');
    $aws_key = get_local('AWS_ACCESS_KEY_ID');
    $aws_secret = get_local('AWS_SECRET_ACCESS_KEY');
  }

  $s3 = Aws\S3\S3Client::factory(array('key' => $aws_key, 'secret' => $aws_secret));

  return $s3;
}

function get_bucket_name() {
  if ($_SESSION['login'] != 'admin') {
    die('Not authenticated');
  }
  $bucket_name = getenv('S3_BUCKET_NAME');
  if (!isset($bucket_name) || empty($bucket_name)) {
    require_once('local.php');
    $bucket_name = get_local('S3_BUCKET_NAME');
  }
  return $bucket_name;
}

?>
