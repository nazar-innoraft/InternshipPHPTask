<?php
class Error404 extends Controller {
  public function index ($a = '', $b = '', $c = '') {
    echo  "this  is error controller";
    $this->view('Error404');
  }
}
