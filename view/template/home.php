<?php

/**
* Display errors
*
*/
ini_set('display_errors', 'On');
error_reporting(E_ALL);

/**
* Start Session
*
*/
session_start();

/**
* included files
*
*/
require '../../model/db.php';
require '../../model/user.php';

/**
* Check SESSIONS
*
*/
if(!isset($_SESSION["user_id"])) {
  header('location: login.phtml');
}

include ('header.phtml');
?>
<div class="header_container">
  <h1>Content Management Department</h1>
</div>
<div class="body_container">
  <div class="home_left">
    <div class="widget_header">
      <h3>Reports</h3>
    </div>
    <div class="widget_body">
      <ul>
        <a href=""><li>Report 1</li></a>
        <a href=""><li>Report 2</li></a>
        <a href=""><li>Report 3</li></a>
      </ul>
    </div>
  </div>
  <div class="home_middle">
    <div class="widget_header">
      <h3>Projects</h3>
    </div>
    <div class="widget_body">
      <ul>
        <a href=""><li>Project 1</li></a>
        <a href=""><li>Project 2</li></a>
        <a href=""><li>Project 3</li></a>
      </ul>
    </div>
  </div>
  <div class="home_right">
    <div class="widget_header">
      <h3>Completed Projects</h3>
    </div>
    <div class="widget_body">
      <ul>
        <a href=""><li>Project 1</li></a>
        <a href=""><li>Project 2</li></a>
        <a href=""><li>Project 3</li></a>
      </ul>
    </div>
  </div>
</div>
<?php include ('footer.phtml'); ?>
