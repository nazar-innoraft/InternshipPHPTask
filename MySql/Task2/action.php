<?php

require 'manage_db.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/action.css">
  <title>Submit page</title>
</head>
<body>
  <div class="container">
    <?php
    if (isset($_POST['submit'])) {
      $ob = new Database();
      $ob->insert_employee_code_table($_POST['employee_code'], $_POST['employee_code_name'], $_POST['employee_domain']);
      $ob->insert_employee_details($_POST['employee_id'], $_POST['employee_first_name'], $_POST['employee_last_name'], $_POST['graduation_precentile']);
      $ob->insert_employee_salary($_POST['employee_id'], $_POST['employee_salary'], $_POST['employee_code']);
      $ob->closeConnection();
    }
    ?>
    <a href="index.html">Update another employee details</a>
  </div>
</body>
</html>
