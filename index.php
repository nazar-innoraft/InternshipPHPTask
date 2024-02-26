<?php
session_start();

// CHECK FOR LOGIN
if ($_SESSION["username"] == "Nazar" && $_SESSION["password"] == "1234") {
    echo "logged in";
} else {
    die("Not logged in");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Home Page</title>
    <style>
        ul{

            font-size: 30px;
        }
        .container{
            max-width: 700px;
            margin: 0 auto;
        }
        .navPage{
            margin: 0 auto;
            font-size: 20px;
            text-align: center;
            a{
                text-decoration: none;
                display: inline-block;
                padding: 20px;
                background: wheat;
            }
            a:hover{
                background-color: blueviolet;
                color: white;
            }
        }
        p{
            font-size: 30px;
        }
    </style>
</head>

<body>
    <a href="logout.php">Click to Logout</a>
    <div class="container"> 
    <h1>Do the PHP Tasks</h1>
    <?php
    // CONTENT FOR SHOW DIFFERENT PAGES
    require_once 'details.php';
    if (isset($_GET["q"])) {
        $page = $_GET["q"];
        echo content($page);
    } else {
        echo content(1);
    }
    ?>
    </div>
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
