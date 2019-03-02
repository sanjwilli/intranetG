<?php

/**
 * User Class: All functionalities the deals with the user are done here
 */
class User extends DB {

  /**
  * get_user(): Gets the infromation about the user from the session id
  *
  */
  public function get_user($s_id) {

    $sql = $this->connect()->query("SELECT login_info.user_id, login_info.username, login_info.ran_num, personal_info.first_name, personal_info.last_name, personal_info.date_of_birth, personal_info.trn, personal_info.nis, personal_info.dl, personal_info.nid, personal_info.email, personal_info.personal_id FROM testIntranet.login_info INNER JOIN testIntranet.personal_info ON testIntranet.login_info.user_id=testIntranet.personal_info.user_id WHERE testIntranet.login_info.user_id = '$s_id'");

    $results = $sql->fetch_array(MYSQLI_BOTH);

    return $results;

  }


  /**
  * get_user_login(): Gets the infromation that is necessary for signing in
  *
  */
  public function get_user_login($email) {

    $sql = $this->connect()->query("SELECT user_id, ran_num, hash_pass FROM testIntranet.login_info WHERE email = '$email'");

    $results = $sql->fetch_array(MYSQLI_BOTH);

    return $results;
  }


  /**
  * add_user(): add the necessary data in to the database when a user signs up
  *
  */
  public function add_user($f_name, $l_name, $username, $email, $ran_num, $hash_pass) {

    $sql = $this->connect()->query("INSERT INTO testIntranet.login_info (username, email, email_confirm, ran_num, hash_pass) VALUES ('$username', '$email', '0', '$ran_num', '$hash_pass')");

    $user_id = $this->get_user_id($email);

    // $sql2 = $mysqli->query("SELECT user_id FROM testIntranet.login_info WHERE email = '$email'");

    $sql3 = $this->connect()->query("INSERT INTO testIntranet.personal_info (first_name, last_name, email, user_id) VALUES ('$f_name', '$l_name', '$email', '$user_id')");

    if ($sql === true && $sql3 === true) {

      return $user_id;
    } else {

      return 0;
    }
  }


  /**
  * edit_user(): Edits the user data
  *
  */
  public function edit_user() {

  }

  /**
  * in_sys_email(): Returns a bool if email is in the system or not
  *
  */
  public function in_sys_email($email) {
    $sql = $this->connect()->query("SELECT email FROM testIntranet.login_info WHERE email = '$email'");

    $results = $sql->fetch_array(MYSQLI_BOTH);

    return $results['email'];
  }

  /**
  * logged(): Logs the current Time and Date of users on the system
  *
  */
  public function logged($user_id, $date) {
    $sql = $this->connect()->query("INSERT INTO testIntranet.login_details (user_id, last_activity) VALUES ('$user_id', '$date')");
  }

  /**
  * update_logged: Updates the last activity of user
  *
  */
  public function update_logged($user_id, $date) {
    $sql = $this->connect()->query("UPDATE testIntranet.login_details SET last_activity = '$date' WHERE user_id = '$user_id'");
  }

  /**
  * get_user_name(); Gets the users name
  */
  public function get_user_name() {
    $sql = $this->connect()->query("SELECT first_name, last_name FROM testIntranet.personal_info");

    while ($row = $sql->fetch_array()) {
      $user_names[] = $row;
    }

    return $user_names;

  }

  /**
  * get_user_address(): gets the user address information
  *
  */
  public function get_user_address($user_id) {
    $sql = $this->connect()->query("SELECT telephone_info.telephone, address_info.street_no, address_info.street, address_info.town_id FROM testIntranet.personal_info INNER JOIN testIntranet.address_info ON personal_info.personal_id = address_info.personal_id INNER JOIN testIntranet.telephone_info ON personal_info.personal_id = telephone_info.personal_id WHERE personal_info.personal_id = '$user_id'");

    $results = $sql->fetch_array(MYSQLI_BOTH);

    return $results;
  }

  /**
  * get_user_id(): gets the user id
  *
  */
  protected function get_user_id($email) {

    $sql = $this->connect()->query("SELECT user_id FROM testIntranet.login_info WHERE email = '$email'");

    $results = $sql->fetch_array(MYSQLI_BOTH);

    return $results['user_id'];
  }
}


?>
