<?php

require 'connection.php';

// Creating an object to get connection and validation.
$ob = new connection();
$token = $_GET['token'];
if (!$ob->is_valid_token($token)) {
  die('Something problem with token');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Reset password</title>
</head>

<body>
  <div class="container">
    <form action="reset_password_process.php" method="post">
      <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

      <label for="password">Enter password: </label>
      <input type="text" name="password" id="pass">

      <label for="c_password">Enter confirm password: </label>
      <input type="text" name="c_password" id="c_pass">

      <input type="submit" name="submit" id="submit">
    </form>
  </div>
  <script src="js/stript.js"></script>
</body>

</html>
