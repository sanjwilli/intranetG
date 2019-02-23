<?php

require '../view/define.php';

$mysqli = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);

global $mysqli;

// Check Connection
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();

}
?>
