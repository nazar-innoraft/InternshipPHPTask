<?php

/**
 * This class extends Database, this class check credentials.
 */
class UserLogin extends Database {
  /**
   *  This function check user's credentials.
   *
   * @param  string $email
   *   User's email.
   * @param  string $pass
   *   User's password.
   *
   * @return string
   *   Return result string.
   */
  public function checkCredential(string $email, string $pass):string {
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
