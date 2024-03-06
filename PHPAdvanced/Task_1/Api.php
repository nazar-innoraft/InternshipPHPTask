<?php

require 'requests.php';

/**
 * This is API class, we make object for each section and store it's corresponding value and implement that.
 */
class API{
  private string $domain_name = 'https://www.innoraft.com';
  private string $main_url = 'https://www.innoraft.com/jsonapi/node/services';
  private $data = array();
  public $field_secondary_title;
  public $field_image;
  public $field_service;
  public $alias;
  public $icon_array = [];
  public $child_count;

  /**
   * This is a constructor, set all the at the time of creation of an object.
   *
   * @param  int $i
   *  Section number.
   *
   * @return void
   */
  function __construct ($i) {
    $response = request($this->main_url);
    $this->data = $response['data'];

    $this->field_secondary_title = $this->data[$i]['attributes']['field_secondary_title']['value'];
    $this->field_service = $this->data[$i]['attributes']['field_services']['value'];
    $this->field_image = $this->domain_name. request($this->data[$i]['relationships']['field_image']['links']['related']['href'])['data']['attributes']['uri']['url'];
    $this->alias = $this->domain_name . $this->data[$i]['attributes']['path']['alias'];
    $this->get_icon($i);
  }
  /**
   * This function gets child image and store in an array.
   *
   * @param  int $i
   *  Section number.
   *
   * @return void
   */
  public function get_icon ($i) {
    $res = request($this->data[$i]['relationships']['field_service_icon']['links']['related']['href']);
    $this->child_count = count($res['data']);
    for($j=0; $j< $this->child_count; $j++){
      $re_link = request($res['data'][$j]['relationships']['field_media_image']['links']['related']['href']);
      array_push($this->icon_array, $this->domain_name. $re_link['data']['attributes']['uri']['url']);
    }
  }
  /**
   * This function return field_secondary_title.
   *
   * @return string
   *  Return value of the variable field_secondary_title.
   */
  public function get_field_secondary_title (): string {
    return $this->field_secondary_title;
  }
  /**
   * This function return field_image.
   *
   * @return mixed
   *  Return value of the variable field_image.
   */
  public function get_field_image (): mixed {
    return $this->field_image;
  }
  /**
   * This function return field_service.
   *
   * @return string
   *  Return value of the variable field_service.
   */
  public function get_field_service (): string {
    return $this->field_service;
  }
  /**
   * This function return alias.
   *
   * @return string
   *  Return value of the variable alias.
   */
  public function get_alias (): string {
    return $this->alias;
  }
}
?>
