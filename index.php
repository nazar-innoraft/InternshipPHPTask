<?php
session_start();
// Check for Login.
if ($_SESSION['userName'] == 'Nazar' && $_SESSION['password'] == '1234') {
    echo 'logged in';
} else {
    die('Not logged in <a href="login.php">Click to Login</a>');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <title>Home Page</title>

</head>

<body>
    <a href="logout.php">Click to Logout</a>
    <div class="container">
    <h1>Do the PHP Tasks</h1>
    <?php
    // Content show as per page number.
    require_once 'details.php';
    if (isset($_GET['q'])) {
        $page = $_GET['q'];
        echo content($page);
    } else {
        header('Location: index.php?q=1');
        exit();
        // echo content(1);
    }
    ?>
    </div>
    <!-- Buttons for page no. -->
    <div class="navPage">
        <a href="?q=1">1</a>
        <a href="?q=2">2</a>
        <a href="?q=3">3</a>
        <a href="?q=4">4</a>
        <a href="?q=5">5</a>
        <a href="?q=6">6</a>
    </div>
</body>

</html>
