<?php
class Forgotpassword extends Controller {
  private $model;
  private $data = [];

  public function index($a = '', $b = '', $c = '') {
    $this->data['show_option'] = 'true';
    $this->view('Forgotpassword', $this->data);
  }

  public function updateWithOtp () {
    if (isset($_POST['get_otp'])) {
      $this->model = $this->model('UserForgotpassword');
      $this->model->updateOtp($this->input('email'));
    }
    $this->data['method'] = 'otp';
    $this->view('Forgotpassword', $this->data);
  }

  public function updateWithToken(string $token = '') {
    if ($token == '') {
      if (isset($_POST['reset_link'])) {
        $this->data['method'] = 'token';
        $this->model = $this->model('UserForgotpassword');
        $res = $this->model->updateToken($this->input('email'));
        if ($res == 'SUCCESS') {
          $this->data['success_msg'] = 'Reset link sent to your email';
        } else {
          $this->data['error_msg'] = $res;
        }
      }
      $this->view('Forgotpassword', $this->data);
    } else {
      $this->data['token'] = $token;
      $this->model = $this->model('UserForgotpassword');
      $res = $this->model->isTokenPresent($token);
      if ($res == 'SUCCESS') {
        if (isset($_POST['reset'])) {
          $result = $this->model->isTokenPresent($token, $this->input('password'));
          if ($result == 'SUCCESS') {
            $this->data['success_msg'] = 'Password updated';
          } else {
            $this->data['error_msg'] = $result;
          }
        }
        $this->view('Resetwithtoken', $this->data);
      } else {
        $this->data['error_msg'] = $res;
        $this->view('Error', $this->data);
      }
    }
  }
}
