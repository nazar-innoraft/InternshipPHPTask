<?php

/**
 * This class extends Controller class, this class show login page and handle login.
 */
class Login extends Controller {
  private $data = ['error_msg' => '', 'success_msg' => ''];

  /**
   * This function index checks if user login or not and redirect to home or login.
   *
   * @return void
   */
  public function index():void {
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


  /**
   * This function checks user's credentials.
   *
   * @return bool
   *   Return true if correct else false.
   */
  public function checkCred(string $email, string $pass): bool {
    $model = $this->model('UserLogin');
    $res = $model->check_credential($email, $pass);
    if($res == 'SUCCESS') {
      setSession($email);
      $this->data['success_msg'] = 'Logging in';
      return true;
    } else {
      $this->data['error_msg'] = $res;
      return false;
    }
  }
}
