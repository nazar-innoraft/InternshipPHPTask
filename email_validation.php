<?php

require 'credential.php';
require 'request.php';

global $api_key;
$apikey = $api_key;

$url = "https://emailvalidation.abstractapi.com/v1/?api_key=" . $apikey . "&email=" . $email_address;

$validation_result = json_decode(email_val($url), true);
return $validation_result['format_valid'] && $validation_result['smtp_check'];
?>
