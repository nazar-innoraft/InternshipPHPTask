<?php

require 'email_credential.php';
require 'request.php';

function email_check (string $email_address): bool{
  global $api_key;
  $apikey = $api_key;

  $url = "https://emailvalidation.abstractapi.com/v1/?api_key=" . $apikey . "&email=" . $email_address;

  $validation_result = json_decode(email_val($url), true);
  return $validation_result['is_valid_format'] && $validation_result['is_smtp_valid'];
}
?>
