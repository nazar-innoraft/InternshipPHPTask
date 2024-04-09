<?php

class Database {
  private $conn;
  protected $result;

  /**
   * This is constructer which make a connection to DB.
   *
   * @return void
   */
  function __construct () {
    try {
      $this->conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASSWORD);
    } catch (PDOException $e) {
      echo 'Error in connection ' . $e->getMessage();
    }
  }

  /**
   * This is a  destructer which close connection to DB.
   *
   * @return void
   */
  function __destruct () {
    $this->conn = null;
  }

  /**
   * This function run sql query.
   *
   * @param  mixed $sql
   *  Sql qruery string.
   * @param  mixed $params
   *  Parameters for sql.
   *
   * @return string
   *  Returns result.
   */
  public function query ($sql, $params = []):string {
    try {
      if (empty($params)) {
        $this->result = $this->conn->prepare($sql);
        return $this->result->execute();
      } else {
        $this->result = $this->conn->prepare($sql);
        return $this->result->execute($params);
      }
    } catch (PDOException $e) {
      echo 'Error in connection ' . $e->getMessage();
      return $e->getMessage();
    }
  }

  /**
   * This function returns row count.
   *
   * @return void
   */
  public function row_count() {
    return $this->result->rowCount();
  }

  /**
   * This function returns all rows.
   *
   * @return void
   */
  public function fetch_all() {
    return $this->result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * This function returns first row.
   *
   * @return void
   */
  public function fetch() {
    return $this->result->fetch(PDO::FETCH_ASSOC);
  }
}
