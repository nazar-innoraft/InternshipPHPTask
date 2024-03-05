<?php

require 'apiInfo.php';

/**
 * User's email address is validating here by calling an api and return true or false.
 *
 * @param string $email_address
 *   Email address is taking as input.
 * @return bool
 *   Returning true if email is valid else false.
 */
function email_val(string $email_address): bool {
	global $api_key;
	$apikey = $api_key;
	$curl = curl_init();
	$url = "https://emailvalidation.abstractapi.com/v1/?api_key=". $apikey. "&email=" . $email_address;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	$data = curl_exec($ch);
	curl_close($ch);

	// Print the data out onto the page.
	if ($data) {
		return true;
	} else {
		return false;
	}
}
?>
