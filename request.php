<?php

 /* Call The api and return the response the JSON file.
 *
 * @param string $url
 *   Url is taking as input to call api.
 *
 * @return string
 *   Returning JSON file.
 */
function email_val(string $url): string {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  $data = curl_exec($ch);
  curl_close($ch);

  return $data;
}
?>
