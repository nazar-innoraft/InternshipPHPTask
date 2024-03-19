<?php

require 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style2.css">
  <title>Reset password status</title>
</head>

<body>
  <div class="container">
    <p id="success">
      <?php
      $ob = new connection();
      if (isset($_POST['submit'])) {
        if($ob->process_forgot_password($_POST['token'], $_POST['password'])) {
          echo "Password Changed Successfully";
        } else {
          echo "Problem occurs Password change";
        }
      }
      ?>
    </p>
  </div>
</body>

</html>
