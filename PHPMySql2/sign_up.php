<?php

require 'manage_db.php';

// If already login it will redirect to the page 4 and no need to login again.
session_start();
if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) {
  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <title>SignUp Page</title>
</head>

<body>
  <div class="container">
    <h2>SignUp Form</h2>
    <form action="sign_up.php" method="post">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required>

      <label for="pass_word">Password</label>
      <input type="password" id="pass" name="pass_word" required>

      <label for="c_password">Confirm Password</label>
      <input type="password" id="c_pass" name="c_password" required>
      <span id="wrong"></span>

      <input type="submit" name="submit" id="submit">

      <p>Already Registered <b><a href="login.php">Login</a></b></p>
    </form>
    <?php
    if (isset($_POST['submit'])) {
      // Creating an object.
      $ob = new DataOparation();
      $ob->insert_login_details($_POST['email'], $_POST['pass_word']);
    }
    ?>
  </div>

  <script src="js/stript.js"></script>
</body>

</html>
