<?php
// $access_key = 'YOUR_ACCESS_KEY';
// $ch = curl_init('http://apilayer.net/api/bulk_check?access_key=' . $access_key . '&email=' . $email_address . '');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $json = curl_exec($ch);
// curl_close($ch);
// $validationResult = json_decode($json, true);

function emailVal($email_address){
	$curl = curl_init();
	$url = "https://mailcheck.p.rapidapi.com/?domain=" . $email_address;

	curl_setopt_array($curl, [
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
			"X-RapidAPI-Host: mailcheck.p.rapidapi.com",
			"X-RapidAPI-Key: dcf64b0e29msh76ee55eb510e56ep17619ejsne016606e1386"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);
	return $response;
}
?>
