<?php

class Logout {
  public function index() {
    unset_session();
    header('Location: /login');
  }
}
