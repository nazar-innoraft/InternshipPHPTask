<?php

require 'db_credential.php';

class Database {
  private $conn;

  /**
   * This is a constructor which building connection to the sql server.
   *
   * @return void
   */
  public function __construct () {
    global $host, $user, $pass, $db;
    $this->conn = new mysqli($host, $user, $pass, $db);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  /**
   * This function closeing Connection with sql server.
   *
   * @return void
   */
  public function closeConnection () {
    $this->conn->close();
  }

  /**
   * This function update details in employee_code_table table.
   *
   * @param  mixed $employee_code
   *  Employee's code.
   * @param  mixed $employee_code_name
   *  Employee's code name.
   * @param  mixed $employee_domain
   *  Employee's domain.
   *
   * @return void
   */
  public function insert_employee_code_table (string $employee_code, string $employee_code_name, string $employee_domain): void {
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

  /**
   * This function update details in employee_details table.
   *
   * @param  mixed $employee_id
   *  Employee's id.
   * @param  mixed $employee_first_name
   *  Employee's first name.
   * @param  mixed $employee_last_name
   *  Employee's last name.
   * @param  mixed $graduation_percentile
   *  Employee's graduation percentile.
   *
   * @return void
   */
  public function insert_employee_details (string $employee_id, string $employee_first_name, string $employee_last_name, int $graduation_percentile): void {
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

  /**
   * This function update details in employee_salary table.
   *
   * @param  mixed $employee_id
   *  Employee's id.
   * @param  mixed $employee_salary
   *  Employee's salary.
   * @param  mixed $employee_code
   * Employee's code.
   *
   * @return void
   */
  public function insert_employee_salary(string $employee_id, int $employee_salary, string $employee_code): void {
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

