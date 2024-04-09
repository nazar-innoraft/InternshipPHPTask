<?php

class UserForgotpassword extends Database {
  /**
   * This function update password to db.
   *
   * @param  mixed $email
   *  User's email.
   * @param  mixed $password
   *  User's password.
   *
   * @return string
   *  Return result.
   */
  public function updatePassword(string $email, string $password): string {
    $sql = "UPDATE credential SET password = ? WHERE email = ?";
    if ($this->isUserPresent($email)) {
      $this->query($sql, [$email, $password]);
      return 'SUCCESS';
    } else {
      return 'User already registered';
    }
  }

  /**
   * This function update genarated otp to db.
   *
   * @param  mixed $email
   *  User's email.
   *
   * @return void
   */
  public function updateOtp(string $email)  {
    if ($this->isUserPresent($email)) {
      $otp = genarate_otp();
      send_email($email, $otp);
      $this->updateOtpToDatabse($email, $otp);
    }
  }

  /**
   * This function user present in db or not.
   *
   * @param  mixed $email
   *  User's email.
   *
   * @return bool
   *  Return true if present else false.
   */
  protected function isUserPresent(string $email): bool {
    $sql = "SELECT email from credential WHERE email = ? LIMIT 1";
    $this->query($sql, [$email]);
    if ($this->fetch() != null) {
      return true;
    }
    return false;
  }

  /**
   * This function update genarated token to db.
   *
   * @param  mixed $email
   *  User's email.
   *
   * @return string
   *  Return string of result.
   */
  public function updateToken(string $email) {
    if ($this->isUserPresent($email)) {
      $token = bin2hex(random_bytes(16));
      if (send_email($email, $token)) {
        $this->updateTokenToDatabse($email, $token);
        return 'SUCCESS';
      }
      return 'Email cannot be sent';
    }
    return 'User not registered';
  }

  /**
   * This function checks if token present to db.
   *
   * @param  mixed $email
   *  User's email.
   *
   * @return string
   *  Return string of result.
   */
  public function isTokenPresent(string $token, string $pass = '') {
    $sql = "SELECT email, token_expiry from credential WHERE token = ?";
    $this->query($sql, [$token]);
    $res = $this->fetch();
    if ($res != null) {
      if (strtotime($res['token_expiry']) > time()) {
        if ($pass != '') {
          $this->updatePassword($res['email'], $pass);
        }
        return 'SUCCESS';
      }
      return 'Time expired';
    }
    return 'Broken Link';
  }

  /**
   * This function update token to databse.
   *
   * @param  mixed $email
   *  User's email.
   * @param  mixed $token
   *  System gernarated token.
   *
   * @return void
   */
  private function updateTokenToDatabse(string $email, string $token) {
    $expiry = date('Y-m-d H:i:s', time() + 5 * 60);
    $sql = "UPDATE credential SET token = ?, token_expiry = ? WHERE email = ?";
    $this->query($sql, [$token, $expiry, $email]);
  }

  /**
   * This function update otp to databse.
   *
   * @param  mixed $email
   *  User's email.
   * @param  mixed $token
   *  System gernarated token.
   *
   * @return void
   */
  private function updateOtpToDatabse(string $email, int $otp ) {
    $expiry = date('Y-m-d H:i:s', time());
    $sql = "UPDATE TABLE credential SET otp = ?, otp_expiry = ? WHERE email = ?";
    $this->query($sql, [$otp, $expiry, $email]);
  }
}
