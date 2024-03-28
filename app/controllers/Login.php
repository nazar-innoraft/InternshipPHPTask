<?php

class Login extends Controller
{
  public function index($a = '', $b = '', $c = '')
  {
    echo  "this  is home controller";
    $this->view('Login');
  }
}
