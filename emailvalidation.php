<?php
function emailVal($email_address)
{
	require 'apiInfo.php';
	$Api = new API();
	$apikey = $Api->getApiKey();
	$curl = curl_init();
	$url = "https://emailvalidation.abstractapi.com/v1/?api_key=". $apikey. "&email=" . $email_address;

	$ch = curl_init();

	// Set the URL that you want to GET by using the CURLOPT_URL option.
	curl_setopt($ch, CURLOPT_URL, $url);

	// Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

	// Execute the request.
	$data = curl_exec($ch);

	// Close the cURL handle.
	curl_close($ch);

	// Print the data out onto the page.
	if($data){
		echo "Verified";
	} else {
		echo "Not Verified";
	}
}
