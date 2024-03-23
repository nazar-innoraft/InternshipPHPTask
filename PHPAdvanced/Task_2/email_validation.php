<?php

require 'email_credential.php';
require 'requests.php';

/**
 * This function checks if email is valid or not.
 *
 * @param  string $email_address
 *  User's email.
 *
 * @return bool
 *  Returning true if valid else false.
 */
function email_check (string $email_address): bool {
  global $api_key;
  $url = "https://emailvalidation.abstractapi.com/v1/?api_key=" . $api_key . "&email=" . $email_address;

  $validation_result = json_decode(request($url), true);
  return $validation_result['is_valid_format'] && $validation_result['is_smtp_valid'];
}
?>
