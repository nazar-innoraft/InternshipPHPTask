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
  <link rel="stylesheet" href="css/style2.css" type="text/css">
</head>

<body>
  <div class="container">
    <h2>Login Form</h2>
    <form method="post">
      <label for="user_name">user_name</label>
      <input type="text" name="user_name">
      <label for="password">Password</label>
      <input type="password" name="password">
      <input type="submit" name="submit" id="submit">
      <span id="wrong">
        <?php
        // If not logged in user can LOGIN using credentials and on successful login it will redirect to page 4.
        require 'credential.php';
        if (isset($_POST['submit'])) {
          // If user_name and password matchs then login else give wrong input.
          if ($_POST['user_name'] == $user_name && $_POST['password'] == $password) {
            $_SESSION['user_name'] = $user_name;
            $_SESSION['password'] = $password;
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
