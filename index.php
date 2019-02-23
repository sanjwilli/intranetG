<?php

/**
* Display errors
*
*/
ini_set('display_errors', 'On');
error_reporting(E_ALL);

/**
* included files
*
*/

/**
* Check SESSIONS
*
*/
if (isset($_SESSION)) {
  header('location: view/template/home.php');
} else {
  header('location: view/template/login.phtml');
}
?>
