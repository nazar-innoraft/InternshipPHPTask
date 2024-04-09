<?php

/**
 * This class extends Controller class, this class show error page.
 */
class Error404 extends Controller {

  /**
   * This function show error page.
   *
   * @param  mixed $a
   *   Url data.
   * @param  mixed $b
   *   Url data.
   * @param  mixed $c
   *   Url data.
   *
   * @return void
   */
  public function index ($a = '', $b = '', $c = ''):void {
    echo  "this  is error controller";
    $this->view('Error404');
  }
}
