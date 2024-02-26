<?php
session_start();
$_SESSION["username"] = "Nazar";
$_SESSION["password"] = "1234";
header("Location: index.php?q=4");
?>