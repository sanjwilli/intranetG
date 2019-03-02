<?php

/**
* Display errors
*
*/
ini_set('display_errors', 'On');
error_reporting(E_ALL);

/**
* Session Start
*
*/
session_start();
/**
* included files
*
*/
require '../model/db.php';
require '../model/reports.php';

if (isset($_POST["action"])) {

  if ($_POST["action"] == "get_weekly") {

  }
}
?>
