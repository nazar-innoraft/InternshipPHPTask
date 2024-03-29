<?php
/**
 * This function takes an url call return after decoding as associative array.
 *
 * @param  mixed $url
 *  It is the target url.
 *
 * @return mixed
 *  Returning associative array.
 */
function request(mixed $url):array {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $response = curl_exec($ch);
  curl_close($ch);
  $data = json_decode($response, true);
  return $data;
}
