<?php

/* Call The api and return the response the JSON file.
 *
 * @param string $url
 *  Url is taking as input to call api.
 *
 * @return string
 *  Returning response.
 */
function request(string $url):string {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $data = curl_exec($ch);
  curl_close($ch);

  return $data;
}
