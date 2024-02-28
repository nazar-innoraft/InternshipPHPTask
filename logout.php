<?php
session_start();
// Unsetting the session value.
session_unset();
// Destroying the session.
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logged out</title>
</head>
<body>
  <div class="container">
    <p>Your are logged out</p>
    <a href="login.php">Click to Login</a>
  </div>
</body>
</html>
