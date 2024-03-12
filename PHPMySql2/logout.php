<?php

require 'manage_session.php';

// Calling endSession function to end the current session.
end_session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Logged out</title>
</head>

<body>
  <div class="container">
    <p>Your are logged out</p>
    <!-- Login button. -->
    <a href="login.php">Click to Login</a>
  </div>
</body>

</html>
