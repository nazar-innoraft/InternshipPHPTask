<?php
require 'db_credential.php';
require 'mailer.php';

class connection{
  private $conn;

  /**
   * This is a constructor which building connection to the sql server.
   *
   * @return void
   */
  public function __construct () {
    global $host, $username, $password, $db;
    $this->conn = new mysqli($host, $username, $password, $db);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  /**
   * This destructor closeing Connection with sql server.
   *
   * @return void
   */
  public function __destruct () {
    $this->conn->close();
  }
  /**
   * This function checks if the token is already present or not.
   *
   * @param  mixed $email
   *  User's email.
   *
   * @return void
   */
  private function is_present_token (string $email) {
    $flag = false;
    $sql = "SELECT * FROM token_table WHERE email = ? LIMIT 1";
    $mysql = $this->conn->prepare($sql);
    $mysql->bind_param('s', $email);
    $mysql->execute();
    $res = $mysql->get_result();
    if($res->num_rows > 0){
      $flag = true;
    } else {
      $flag = false;
    }
    $mysql->close();
    return $flag;
  }

  /**
   * This function checks if the token is valid or not.
   *
   * @param  mixed $token
   *  Token which was sent on email.
   *
   * @return bool
   *  Returns true if valid else false.
   */
  public function is_valid_token (string $token): bool {
    $hash_token  = hash("sha256", $token);
    $sql = "SELECT * FROM token_table WHERE token = ?";
    $mysql = $this->conn->prepare($sql);
    $mysql->bind_param("s", $hash_token);
    $mysql->execute();
    $res = $mysql->get_result();
    $row = $res->fetch_assoc();
    if($row === null){
      return false;
    }
    if(strtotime($row['expiry_time'] <= time())){
      return false;
    }
    return true;
  }

  /**
   * This function updates user's password.
   *
   * @param  mixed $email
   *  User's email.
   * @param  mixed $pass
   *  User's entered password.
   *
   * @return bool
   *  Returns true if succesfully updated else false.
   */
  private function update_password (string $email, string $pass): bool {
    $sql = "UPDATE credential SET pass_word=? WHERE email = ?";
    $mysql = $this->conn->prepare($sql);
    $password = password_hash($pass, PASSWORD_DEFAULT);
    $mysql->bind_param("ss", $password, $email);
    if($mysql->execute()){
      return true;
    }
    return false;
  }

  /**
   * This function delete token's entry.
   *
   * @param  mixed $token
   *  System genarated token.
   *
   * @return bool
   *  Returns true if successfully deleted else false.
   */
  private function delete_token (string $token): bool {
    $sql = "DELETE FROM token_table WHERE token = ?";
    $mysql = $this->conn->prepare($sql);
    $mysql->bind_param("s", $token);
    if($mysql->execute()){
      return true;
    }
    return false;
  }

  /**
   * This function process takes of password updation and token deletion.
   *
   * @param  mixed $token
   *  Token which wass sent on email.
   * @param  mixed $pass
   *  User's entered password.
   *
   * @return bool
   *  Returns true if successfully processed else false.
   */
  public function process_forgot_password (string $token, string $pass): bool{
    $hash_token = hash("sha256", $token);
    $sql = "SELECT * FROM token_table WHERE token = ?";
    $mysql = $this->conn->prepare($sql);
    $mysql->bind_param("s", $hash_token);
    $mysql->execute();
    $res = $mysql->get_result();
    $row = $res->fetch_assoc();
    // $this->update_password($row['email'], $pass);
    // $this->delete_token($hash_token);
    if($this->update_password($row['email'], $pass) && $this->delete_token($hash_token)){
      return true;
    }
    return false;
  }

  /**
   * This function creates and updates token in db.
   *
   * @param  mixed $email
   *  User's email.
   *
   * @return string
   *  Returns token if generated else empty string.
   */
  private function update_token (string $email): string {
    $token = bin2hex((random_bytes(12)));
    $hash_token  = hash("sha256", $token);
    $expiry = date("Y-m-d H:i:s", time() + 60 * 5);
    $sql = "INSERT INTO token_table (email, token, expiry_time) VALUES (?, ?, ?)";
    $mysql = $this->conn->prepare($sql);
    $mysql->bind_param("sss", $email, $hash_token, $expiry);
    if($mysql->execute()){
      $mysql->close();
      return $token;
    }
    $mysql->close();
    return "";
  }

  /**
   * This function checks if email is registered or not.
   *
   * @param  mixed $email
   *  User entered email.
   *
   * @return bool
   *  Returns true if exist else false.
   */
  public function is_exist (string $email): bool {
    $sql = "SELECT * FROM credential WHERE email = ? LIMIT 1";
    $mysql = $this->conn->prepare($sql);
    $mysql->bind_param('s', $email);
    if ($mysql->execute()) {
      $res = $mysql->get_result();
      if ($res->num_rows > 0) {
        $mysql->close();
        return true;
      }
    }
    $mysql->close();
    return false;
  }
  /**
   * This function send forgot link in email after validating token.
   *
   * @param  mixed $email
   *  User's email.
   *
   * @return string
   *  Returns process status.
   */
  public function send_forgot_email (string $email): string {
    if(!$this->is_present_token($email)){
      $token = $this->update_token($email);
      if($token != ""){
        send_email($email, $token);
        return "Reset link send check your email";
      }
      return "Email generation error";
    }
    return "Email already send";
  }
}
?>
