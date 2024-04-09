<?php

class Login extends Controller {
  private $data = ['error_msg' => '', 'success_msg' => ''];

  public function index() {
    if(is_loggedin()){
      header('Location: /home');
    } else {
      if(isset($_POST['login'])){
        if($this->checkCred($this->input('email'), $this->input('password'))) {
          header('Location: /home');
          exit;
        }
      }
      $this->view('Login', $this->data);
    }
  }

  public function setSession(string $email) {
    session_start();
    $_SESSION['username'] = $email;
  }

  public function checkCred(string $email, string $pass) {
    $model = $this->model('UserLogin');
    $res = $model->check_credential($email, $pass);
    if($res == 'SUCCESS') {
      $this->setSession($email);
      $this->data['success_msg'] = 'Logging in';
      return true;
    } else {
      $this->data['error_msg'] = $res;
      return false;
    }
  }
}
