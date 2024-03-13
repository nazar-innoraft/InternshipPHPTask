<?php
session_start();
if (!isset($_SESSION['user_name']) && !isset($_SESSION['password'])) {
  include 'access_denied.html';
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <title>Home Page</title>
</head>

<body>
  <div class="container">
    <?php
    // Content show as per page number.
    parse_str($_SERVER['QUERY_STRING'], $parameters);
    if (isset($parameters['q'])) {
      if ($parameters['q'] > 0 && $parameters['q'] <= 7) {
        include "pages/page{$parameters['q']}.php";
      } else {
        echo 'Wrong Page';
        exit();
      }
    } else {
      header('Location: index.php?q=1');
      exit();
    }
    ?>
  </div>
  <!-- Buttons for page navigation. -->
  <div class="navPage">
    <a href="?q=1">1</a>
    <a href="?q=2">2</a>
    <a href="?q=3">3</a>
    <a href="?q=4">4</a>
    <a href="?q=5">5</a>
    <a href="?q=6">6</a>
  </div>
  <!-- Button to log out. -->
  <a id="logout" href="logout.php">Click to Logout</a>

</body>

</html>
