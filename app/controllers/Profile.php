<?php

class Profile extends Controller {
  private $data = ['success_message' => '', 'error_message' => ''];
  private $model;
  public function index($data = []) {
    if (is_loggedin()) {
      $this->model = $this->model('UserProfile');
      if (isset($_POST['update'])) {
        $this->updateProfile();
      }
      if (empty($data)) {
        $this->view('Error');
      } else {
        $res = $this->model->isProfileExist($data);
        if ($res == false) {
          $this->view('Error');
        } else {
          $this->view('Profile', $res);
        }
      }
    } else {
      header('Location: /login');
      exit;
    }
  }
  private function updateProfile() {

    if (isset($_FILES['imageFile'])) {
      $file_name = $_SESSION['username'] . '.jpg';
      $uploadDir = 'assets/profile_images/';
      $file_name = $_SESSION['username'] . '.' . 'jpg';

      $uploadedFile = $uploadDir . $file_name;
      if (move_uploaded_file($_FILES['imageFile']['tmp_name'], $uploadedFile)) {
      } else {
        $this->data['error_message'] = 'No file selected.';
      }
    }

    $no_error = true;
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
      $res = $this->model->update($this->input('first_name'), $this->input('last_name'), $this->input('phone'), $_SESSION['username']);
      if ($res == 'SUCCESS') {
        $this->data['success_message'] = 'Updated successfully';
      } else {
        $this->data['error_message'] = $res;
      }
    }
  }
}
