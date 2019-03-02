<?php

class DB {

  private $servername;
  private $username;
  private $password;
  private $database;

  protected function connect() {

    $this->servername = "192.168.120.132";
    $this->username = "sanjwillm";
    $this->password = "sanjwillm456";
    $this->database = "testIntranet";

    $mysqli = new mysqli($this->servername, $this->username, $this->password, $this->database);

    return $mysqli;
  }
}
?>
