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
    <form action="forgot.php" method="post">
      <label for="email">Enter your email for get otp</label>
      <input type="email" name="email" id="email">
      <?php
      require 'manage_db.php';
      if (isset($_POST['submit'])) {
        if (check_email($_POST['email'])) {
          echo '<label for="otp">Enter otp: </label>
          <input type="number" max="6">';
        }
      }
      ?>
      <input type="submit" name="submit" id="submit">
    </form>
  </div>
</body>

</html>
