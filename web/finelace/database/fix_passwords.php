<?php

require 'database.php';

$db = get_db();

$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

foreach ($db->query('SELECT * FROM siteuser') as $row) {
  $pass = $row['userpassword'];
  echo $pass . '<br />';
  $hashpass = password_hash($pass, PASSWORD_DEFAULT);
  echo $hashpass . '<br />';
  $id = $row['userid'];
  echo $id . '<br />';

  $stmt = $db->prepare('UPDATE siteuser SET userpassword=:pass WHERE userid=:userid');
  $stmt->bindValue(':userid', $id);
  $stmt->bindValue(':pass', $hashpass);
  if ($stmt->execute()) {
    echo 'it worked.';
  } else {
    print_r($db->errorInfo());
  }
}

 ?>
