<?php

require './../vendor/autoload.php';

use Google_Client;
use Google_Service_Oauth2;

class GoogleLogin extends Controller {
  public function index() {
    global $client_id, $client_secret, $redirect_uri;

    $client = new Google_Client();
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);
    $client->addScope('profile');
    $client->addScope('email');

    if (isset($_GET['code'])) {
      $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

      $oAuth = new Google_Service_OAuth2($client);
      $user_data = $oAuth->userinfo_v2_me->get();
      $email_address = $user_data['email'];
      $first_name = $user_data['givenName'];
      $last_name = $user_data['familyName'];


      // $client->setAccessToken($token);
      // $googe_auth = new Google_Service_Oauth2($client);
      // $google_info = $googe_auth->userinfo->get();
      echo '<pre>';
      echo var_dump($user_data);
      echo '</pre>';
    } else {
      echo '<a href="' . $client->createAuthUrl() . '">Login with google</a>';
    }

  }
}
