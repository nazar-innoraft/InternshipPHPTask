<?php

/**
 * This class extends Database, this class handles signup process.
 */
class UserSignUp extends Database {
  /**
   * This function insert signup details to db.
   *
   * @param  mixed $email
   *   User's email.
   * @param  mixed $first_name
   *   User's firstname.
   * @param  mixed $last_name
   *   User's last name.
   * @param  mixed $phone
   *   User's phone.
   * @param  mixed $password
   *   User's password.
   * @param  mixed $image_path
   *   User's image_path.
   *
   * @return string
   *   Returning reault string.
   */
  public function insert(string $email, string $first_name, string $last_name, string $phone, string $password, string | null $image_path = ''):string {
    $sql = "INSERT INTO credential (email, first_name, last_name, phone, password, image_path) VALUES (?, ?, ?, ?, ?, ?)";
    // $image_path = $email. '/'. $image_path;
    if(!$this->isUserPresent($email)) {
      $this->query($sql, [$email, $first_name, $last_name, $phone, $password, $image_path]);
      return 'SUCCESS';
    } else {
      return 'User already registered';
    }
  }

  /**
   * This function insert from data from Google.
   *
   * @param  mixed $first_name
   *   User's firstname.
   * @param  mixed $last_name
   *   User's last name.
   * @param  mixed $email
   *   User's email.
   *
   * @return string
   *   Returns response.
   */
  public function insertFromGoogle(string $first_name, string $last_name, string $email):string {
    $sql = "INSERT INTO credential (first_name, last_name, email) VALUES (?, ?, ?)";
    if(!$this->isUserPresent($email)) {
      $this->query($sql, [$first_name, $last_name, $email]);
      return 'SUCCESS';
    } else {
      return 'User already registered';
    }
  }

  /**
   * This function checks if user present in db or not.
   *
   * @param  mixed $email
   *   User's email.
   *
   * @return bool
   *   Returns true if present else false.
   */
  private function isUserPresent(string $email):bool {
    $sql = "SELECT email from credential WHERE email = ?";
    $this->query($sql, [$email]);
    if ($this->fetch() != null) {
      return true;
    }
    return false;
  }
}

