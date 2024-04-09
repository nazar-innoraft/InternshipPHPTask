<?php

class UserLogin extends Database {
  public function check_credential(string $email, string $pass) {
    $sql = "SELECT * from credential WHERE email = ? LIMIT 1";
    $this->query($sql, [$email]);
    $res = $this->fetch();

    if($res != null) {
      if ($res['password'] == $pass) {
        return 'SUCCESS';
      } else {
        return 'Wrong password';
      }
    } else {
      return 'User not registered';
    }
  }
}
