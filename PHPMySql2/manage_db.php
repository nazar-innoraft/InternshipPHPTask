<?php

require 'db_credential.php';


class DataOparation {

  private $conn;

  /**
   * This is a  constructor.
   *
   * @return void
   */
  public function __construct () {
    global $host, $username, $password, $db;
    $this->conn = new mysqli($host, $username, $password, $db);
    if ($this->conn->connect_error) {
      echo 'Connection not estsblished';
    }
  }

  /**
   * This is a destruct.
   *
   * @return void
   */
  public function __destruct () {
    $this->conn->close();
  }

  /**
   * This function add login details into server.
   *
   * @param  string $user
   *  This contains username.
   * @param  string $pass
   *  This contains password.
   * @param  string $email
   *  This contains email.
   *
   * @return void
   */
  public function insert_login_details(string $email, string $pass): void {
    // Checking if username alreeady exist or not.
    $check_username = "SELECT * FROM credential WHERE email = ? LIMIT 1";
    $mysqli_check = $this->conn->prepare($check_username);
    $mysqli_check->bind_param("s", $email);
    $mysqli_check->execute();
    $res = $mysqli_check->get_result();
    $mysqli_check->close();
    if ($res->num_rows > 0) {
      echo 'Username already exits';
    } else {
      // Inserting the user credentials.
      $hassed_pass = password_hash($pass, PASSWORD_DEFAULT);
      $sql = "INSERT INTO credential (email, pass_word) VALUES (?, ?)";
      $mysql = $this->conn->prepare($sql);
      $mysql->bind_param("ss", trim($email), $hassed_pass);

      if ($mysql->execute()) {
        echo 'Registration Successful';
      } else {
        echo 'Error: ' . $mysql->error;
      }
      $mysql->close();
    }
  }

  /**
   * This function verify login credentials.
   *
   * @param  mixed $email
   *  User's email.
   * @param  mixed $pass
   *  User's password.
   *
   * @return bool
   *  Return true if credential match else false.
   */
  function check_login_details (string $email, string $pass): bool {
    $flag = false;
    $check_username = "SELECT pass_word FROM credential WHERE email = ?";
    $mysqli_check = $this->conn->prepare($check_username);
    $mysqli_check->bind_param("s", $email);
    $mysqli_check->execute();
    $result = $mysqli_check->get_result();
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      // Verify the password
      if (password_verify($pass, $row['pass_word'])) {
        echo "Login successful! Welcome, " . $row['email'];
        $flag = true;
      } else {
        // Password is incorrect
        echo "Incorrect password!";
        $flag = false;
      }
    } else {
      // User with the provided username does not exist
      echo "User not found!";
      $flag = false;
    }
    $mysqli_check->close();
    return $flag;
  }
  /**
   * This function checks is email exists in DB or not
   *
   * @param  mixed $email
   *  User's email.
   *
   * @return bool
   *  Return true if exist else false.
   */
  function check_email(string $email): bool {
    $check_username = "SELECT * FROM credential WHERE email = ? limit 1";
    $mysqli_check = $this->conn->prepare($check_username);
    $mysqli_check->bind_param("s", $email);
    $mysqli_check->execute();
    $result = $mysqli_check->get_result();
    if ($result->num_rows > 0) {
      return true;
    } else {
      return false;
    }
  }
}
?>
