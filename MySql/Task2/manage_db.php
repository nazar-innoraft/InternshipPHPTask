<?php

require 'db_credential.php';

class Database {
  private $conn;

  public function __construct () {
    global $host, $user, $pass, $db;
    $this->conn = new mysqli($host, $user, $pass, $db);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  public function getConnection () {
    return $this->conn;
  }

  public function closeConnection () {
    $this->conn->close();
  }
  public function insert_employee_code_table (string $employee_code, string $employee_code_name, string $employee_domain) {
    $sql = "INSERT INTO employee_code_table VALUES (?, ?, ?)";
    $mysql = $this->conn->prepare($sql);
    $mysql->bind_param('sss', $employee_code, $employee_code_name, $employee_domain);

    if ($mysql->execute()) {
      echo "employee_code_table updated \n";
    } else {
      echo 'Error: ' . $mysql->error;
    }
    $mysql->close();
  }

  public function insert_employee_details (string $employee_id, string $employee_first_name, string $employee_last_name, int $graduation_percentile) {
    $sql = "INSERT INTO employee_details VALUES (?, ?, ?, ?)";
    $mysql = $this->conn->prepare($sql);
    $mysql->bind_param('sssi', $employee_id, $employee_first_name, $employee_last_name, $graduation_percentile);

    if ($mysql->execute()) {
      echo "employee_details update \n";
    } else {
      echo 'Error: ' . $mysql->error;
    }
    $mysql->close();
  }

  public function insert_employee_salary(string $employee_id, int $employee_salary, string $employee_code) {
    $sql = "INSERT INTO employee_salary VALUES (?, ?, ?)";
    $mysql = $this->conn->prepare($sql);
    $mysql->bind_param('sis', $employee_id, $employee_salary, $employee_code);

    if ($mysql->execute()) {
      echo "employee_salary update \n";
    } else {
      echo 'Error: ' . $mysql->error;
    }
    $mysql->close();
  }
}

