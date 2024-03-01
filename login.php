<?php
session_start();
// If already login it will redirect to the page 4 and no need to login again.
if (isset($_SESSION['userName'])) {
  header('Location: index.php?q=4');
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
    <form action="" method="post">
      <label for="userName">Username</label>
      <input type="text" name="userName">
      <label for="password">Password</label>
      <input type="password" name="password">
      <input type="submit" id="submit" value="Submit">
      <span id="wrong">
        <?php
        // If not logged in user can LOGIN using credentials and on successful login it will redirect to page 4.
        require 'credential.php';
        if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
          // If username and password matchs then login else give wrong input.
          if ($_POST['userName'] == $username && $_POST['password'] == $password) {
            $_SESSION['userName'] = $username;
            $_SESSION['password'] = $password;
            header('Location: index.php?q=4');
            exit();
          } else {
            echo 'Wrong username or password';
          }
        }
        ?></span>
    </form>
  </div>
</body>

</html>
