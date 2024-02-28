<?php
    $db_host = "localhost";
    $db_username = "nazar";
    $db_password = "1234";
    $db_name = "Nazar";

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);
    if($conn->connect_error){
        die("Connection failed ". $conn->connect_error);
    }
    echo "connected";
?>
