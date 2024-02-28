<?php
session_start();
session_unset();
session_destroy();
echo "You are logged out <a href=\"login.php\">Click to Login</a>";
?>