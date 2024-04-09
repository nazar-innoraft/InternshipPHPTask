<?php

require './../vendor/autoload.php';

use Google\Client as Google_Client;
use Google\Service\Oauth2 as Google_Service_Oauth2;


class Signup extends Controller {
  private $data = ['success_message' => '', 'error_message' => ''];

  public function index() {
    if(isset($_GET['code'])) {
      $this->googleLogin();
    }
    $this->view('Signup', $this->data);
  }

  public function signup() {
    $userModel = $this->model('UserSignUp');
    if(isset($_POST['sign_up'])){
      $file_name = null;
      if (isset($_FILES['imageFile']) && $_FILES['imageFile']['error'] === UPLOAD_ERR_OK) {
        $file_name = $this->input('email'). '.jpg';
        $uploadDir = 'assets/profile_images/';
        $file_name = $this->input('email') . '.' . 'jpg';

        $uploadedFile = $uploadDir . $file_name;
        if (move_uploaded_file($_FILES['imageFile']['tmp_name'], $uploadedFile)) {
        } else {
          $this->data['error_message'] = 'No file selected.';
        }
      }

      $no_error = true;
      if (empty($this->input('email'))) {
        $no_error = false;
        $this->data['error_message'] .= 'email cannot be blank ';
      }
      if (empty($this->input('first_name'))) {
        $no_error = false;
        $this->data['error_message'] .= 'first_name cannot be blank ';
      }
      if (empty($this->input('last_name'))) {
        $no_error = false;
        $this->data['error_message'] .= 'last_name cannot be blank ';
      }
      if (empty($this->input('last_name'))) {
        $no_error = false;
        $this->data['error_message'] .= 'last_name cannot be blank ';
      }

      if ($no_error) {
        if (is_password_valid($this->input('password'), $this->input('c_password')) == 'SUCCESS') {
          $res = $userModel->insert($this->input('email'), $this->input('first_name'), $this->input('last_name'), $this->input('phone'), $this->input('password'), $file_name);
          if ($res == 'SUCCESS') {
            $this->data['success_message'] = 'You are registered successfully';
          } else {
            $this->data['error_message'] = $res;
          }
        } else {
          $this->data['error_message'] = 'Password not in correct format';
        }
      }
    }
    $this->index();
  }

  public function googleLogin () {
    echo 'google';
    global $client_id, $client_secret, $redirect_uri;

    $client = new Google_Client();
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);
    $client->addScope('profile');
    $client->addScope('email');

    if (isset($_GET['code'])) {
      $userModel = $this->model('UserSignUp');
      $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
      if (isset($token['error']) != 'invalid_grant') {
        $oAuth = new Google_Service_Oauth2($client);
        $user_data = $oAuth->userinfo_v2_me->get();
        $email_address = $user_data['email'];
        $first_name = $user_data['givenName'];
        $last_name = $user_data['familyName'];
      }
      $res = $userModel->insertFromGoogle($first_name, $last_name, $email_address);
      if ($res == 'SUCCESS') {
        $this->data['success_message'] = 'You are registered successfully';
      } else {
        $this->data['error_message'] = $res;
      }
      $this->view('Signup', $this->data);
    }
    echo '<a href="' . $client->createAuthUrl() . '">Login with google</a>';
  }
}
