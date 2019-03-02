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

  $firstname = $_POST['first_name'];
  $lastname = $_POST['last_name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_pass = $_POST['confirm_pass'];

  $add_user = new User;

  if($add_user->in_sys_email($email) != true) {

    $ran_num = rand(10000, 99999);

    if ($password == $confirm_pass) {

      $hash = $password . $ran_num;

      $hash_pass = password_hash($hash, PASSWORD_DEFAULT);

      $s_id = $add_user->add_user($firstname, $lastname, $username, $email, $ran_num, $hash_pass);

      if ($s_id != 0) {

        $date = date("Y-m-d H:i:s");

        $add_user->logged($s_id, $date);

        $_SESSION[user_id] = $s_id;

        header('location: ../../intranetG/view/template/home.php');

      } else {

        $msg = "Sorry there must have been an issue creating your account";
        header("location: ../../intranetG/view/template/sign_up.phtml?=$msg");
      }

    } else {

      $msg = "Sorry teh Password and Confirm Password did not match, please try again";
      header("location: ../../intranetG/view/template/sign_up.phtml?=$msg");
    }
  } else {
    // email is not in the system
    $msg = "The Email provided already exist in the system";
    header("location: ../../intranetG/view/template/sign_up.phtml?=$msg");
  }

  // code...
} else {
  header("location: ../../intranetG/view/template/sign_up.phtml");
}



?>
