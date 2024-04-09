<?php

class UserProfile extends Database {
  public function isProfileExist($email) {
    try {
      $sql = "SELECT * from credential WHERE email = ? LIMIT 1";
      $this->query($sql, [$email]);
      $res = $this->fetch();
      if ($res == null) {
        return false;
      }
      return $res;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
  public function update(string $first_name, string $last_name, string $phone, string $email) {
    try {
      $sql = "UPDATE credential SET first_name = ?, last_name = ?, phone = ? WHERE email = ?";
      $this->query($sql, [$first_name, $last_name, $phone, $email]);
      return 'SUCCESS';
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
