<?php
session_start();
if(isset($_SESSION['userName'])){
  header('Location: index.php?q=4');
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style2.css" type="text/css">
</head>
<body>
  <div class="container">
    <h2>Login Form</h2>
    <form action="" method="post">
      <label for="userName">Username</label> <br>
      <input type="text" name="userName"> <br>
      <label for="password">Password</label> <br>
      <input type="text" name="password"> <br> <br>
      <input type="submit" value="Submit">
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['userName'] == 'Nazar' && $_POST['password'] == '1234') {
          $_SESSION['userName'] = 'Nazar';
          $_SESSION['password'] = '1234';
          header('Location: index.php?q=4');
          exit();
        } else {
          echo 'Wrong username or password';
        }
      }
      ?>
    </form>
  </div>
</body>
</html>
