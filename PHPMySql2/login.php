<?php
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
</head>

<body>
  <div class="container">
    <h2>Login Form</h2>
    <form action="login.php" method="post">
      <label for="email">email:</label>
      <input type="email" name="email" required>
      <label for="password">Password</label>
      <input type="password" name="password" required>
      <input type="submit" name="submit" id="submit" value="Login">
      <p>Not a User <b><a href="sign_up.php">Sign Up</a></b> <b><a href="forgot.php">Forgot password</a></b></p>
      <span id="wrong">
        <?php
        // If not logged in user can LOGIN using credentials and on successful login it will redirect to page 4.

        require 'manage_db.php';

        if (isset($_POST['submit'])) {
          // If user_name and password matchs then login else give wrong input.
          // echo check_login_details($_POST['user_name'], $_POST['password']);

          if (check_login_details($_POST['email'], $_POST['password'])) {
            $_SESSION['user_name'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            header('Location: index.php');
            exit();
          } else {
            echo 'Wrong user_name or password';
          }
        }
        ?></span>
    </form>
  </div>
</body>

</html>
