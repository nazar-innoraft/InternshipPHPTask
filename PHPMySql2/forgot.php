<?php

require 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Forgot Password</title>
</head>

<body>
  <div class="container">
    <h2>Forgot Password</h2>
    <hr>
    <form action="forgot.php" method="post">
      <label for="email">Enter your email :</label>
      <input type="email" name="email" id="email">

      <input type="submit" name="submit" id="submit">
    </form>
    <div class="message">
      <?php
      if (isset($_POST['submit'])) {
        $ob = new connection();
        if ($ob->is_exist($_POST['email'])) {
          $message = $ob->send_forgot_email($_POST['email']);
          echo $message;
        } else {
          echo "Email not registered";
        }
      }
      ?>
    </div>
  </div>
</body>

</html>
