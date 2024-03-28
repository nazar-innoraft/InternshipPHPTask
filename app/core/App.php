<?php
class App {
  private $controller = 'Home';
  private $method = 'index';

  private function split_url () {
    $url = $_GET['url'];
    $url = trim($url);
    echo var_dump($url);
    $url = explode("/", $url);

    echo "<pre>";
    echo var_dump($url);
    echo "</pre>";
    return $url;
  }

  public function load_controller () {
    $url = $this->split_url();
    $cnt = 0;
    echo sizeof($url);
    if($url[0] == "" && sizeof($url) > 1){
      $cnt = 1;
    }
    $filename = "../app/controllers/". ucfirst($url[$cnt]). ".php";
    if (file_exists($filename)) {
      require_once "$filename";
      $this->controller = ucfirst($url[$cnt]);
    } else {
      $filename = "../app/controllers/" . ucfirst($url[$cnt]). "/". ucfirst($url[$cnt]) . ".php";
      if (file_exists($filename)) {
        require_once "$filename";
        $this->controller = ucfirst($url[$cnt]);
      } else {
        require '../app/controllers/Error404.php';
        $this->controller = 'Error404';
      }
    }
    $cont = new $this->controller;
    call_user_func_array([$cont, $this->method], []);
  }
}

?>
