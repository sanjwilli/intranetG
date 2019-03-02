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
require '../model/user.php';

if (!empty($_POST)) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $log_user = new User;

  $results = $log_user->get_user_login($email);

  if ($results) {

    $hash = $password . $results['ran_num'];

    if (password_verify($hash, $results['hash_pass'])) {

      $date = date("Y-m-d H:i:s");

      $log_user->update_logged($results['user_id'], $date);

      $_SESSION[user_id] = $results['user_id'];

      header("location: ../../intranetG/view/template/home.php");
    } else {

      $msg = "The Credentials do not match";
      header("location: ../../intranetG/view/template/login.phtml?=$msg");
    }

  } else {
    $msg = "Somwthing wen't wrong please try again";
    header("location: ../../intranetG/view/template/login.phtml?=$msg");
  }
}
?>
