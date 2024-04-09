<?php

class Home extends Controller {
  private $model;
  private $data1 = [];
  private $data2 = [];
  public function index () {
    if(is_loggedin()){
      $this->model = $this->model('UserHome');
      if (isset($_POST['submit_post'])) {
        $this->handlePosts();
      }
      $this->data1 = $this->model->getPosts();
      $this->view('Home', array_merge($this->data1, $this->data2));
      echo '<pre>';
      echo var_dump(array_merge($this->data1, $this->data2));
      echo '</pre>';
    } else {
      header('Location: /login');
    }
  }

  public function handlePosts() {
    $file_name = null;
    $content = $this->input('content');
    if (!empty($content)) {
      if (isset($_FILES['upload_file']) && $_FILES['upload_file']['error'] === UPLOAD_ERR_OK) {
        if ($_FILES['upload_file']['size'] < 1 * 1024 * 1024) {
          echo $_FILES['upload_file']['size'];
          $uploadDir = 'assets/post_images/';
          $fileExtension = pathinfo($_FILES['upload_file']['name'], PATHINFO_EXTENSION);
          $file_name = uniqid() . '.' . $fileExtension;
          echo var_dump($file_name);
          echo var_dump($_FILES['upload_file']['name']);

          $uploadedFile = $uploadDir . $file_name;
          echo var_dump($uploadedFile);
          if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $uploadedFile)) {
            echo var_dump($this->model->updatePost($content, $file_name));
          } else {
            echo 'not moving';
          }
        } else {
          echo 'image is too large';
          return;
        }
      } else {
        echo var_dump($this->model->updatePost($content));
        echo 'no image';
      }
    } else {
      $this->data2['error_message'] = 'Please write something';
    }
  }
}
