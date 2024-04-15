<?php

/**
 * This class extends Controller class, this class show home page.
 */
class Home extends Controller {
  private $model;
  private $data1 = [];
  private $data2 = [];

  /**
   * This function shows home page.
   *
   * @param  mixed $para_meter1
   *   Url data.
   * @param  mixed $para_meter2
   *   Url data.
   * @param  mixed $para_meter3
   *   Url data.
   *
   * @return void
   */
  public function index ($para_meter1 = '', $para_meter2 = '', $para_meter3 = ''):void {
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

  /**
   * This function handle uploaded post.
   *
   * @return void
   */
  public function handlePosts():void {
    $file_name = null;
    $content = $this->input('content');
    if (!empty($content)) {
      if (isset($_FILES['upload_file']) && $_FILES['upload_file']['error'] === UPLOAD_ERR_OK) {
        if ($_FILES['upload_file']['size'] < 1 * 1024 * 1024) {
          echo $_FILES['upload_file']['size'];
          $uploadDir = 'assets/post_images/';
          $fileExtension = pathinfo($_FILES['upload_file']['name'], PATHINFO_EXTENSION);
          $file_name = uniqid() . '.' . $fileExtension;

          $uploadedFile = $uploadDir . $file_name;
          echo var_dump($uploadedFile);
          if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $uploadedFile)) {
          $this->model->updatePost($content, $file_name);
          } else {
            $this->data2['error_message'] = 'not moving';
          }
        } else {
          $this->data2['error_message'] = 'image is too large';
          return;
        }
      } else {
        $this->model->updatePost($content);
      }
    } else {
      $this->data2['error_message'] = 'Please write something';
    }
  }
}
