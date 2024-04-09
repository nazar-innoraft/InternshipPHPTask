<?php

class UserSignUp extends Database {
  public function insert(string $email, string $first_name, string $last_name, string $phone, string $password, string | null $image_path = '') {
    echo gettype($phone);
    $sql = "INSERT INTO credential (email, first_name, last_name, phone, password, image_path) VALUES (?, ?, ?, ?, ?, ?)";
    // $image_path = $email. '/'. $image_path;
    if(!$this->isUserPresent($email)) {
      $this->query($sql, [$email, $first_name, $last_name, $phone, $password, $image_path]);
      return 'SUCCESS';
    } else {
      return 'User already registered';
    }
  }

  public function insertFromGoogle(string $first_name, string $last_name, string $email) {
    $sql = "INSERT INTO credential (first_name, last_name, email) VALUES (?, ?, ?)";
    if(!$this->isUserPresent($email)) {
      $this->query($sql, [$first_name, $last_name, $email]);
      return 'SUCCESS';
    } else {
      return 'User already registered';
    }
  }

  private function isUserPresent(string $email) {
    $sql = "SELECT email from credential WHERE email = ?";
    $this->query($sql, [$email]);
    if ($this->fetch() != null) {
      return true;
    }
    return false;
  }
}

