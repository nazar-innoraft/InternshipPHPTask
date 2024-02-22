<?php
// CONNECT TO SERVER ---------------------------------------
// require_once("connection.php");

if (isset($_POST["submit"])) {
    // ----------------------------------------  NAME AND CONTACTS  ----------------------------------------
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $fullname = $fname. " ". $lname;
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    echo "<h2>Hi, ", $fname,  " ", $lname, "</h2><br>Your email is ", $email, "<br>Your Phone Number is ", $phone;

    // ----------------------------------------  IMAGE Upload  ----------------------------------------
    $uploadDir = "uploads/";
    $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);
    //  echo "\n". $uploadFile. "\n";
    $check = false;
    if($_FILES["image"]["tmpName"]){
        $check = getimagesize($_FILES["image"]["tmpName"]);
    }
    // echo $check;
    if ($check != false) {
        if (move_uploaded_file($_FILES["image"]["tmpName"], $uploadFile)) {
            echo "Image uploaded successfully.";
        } else {
            echo "<br>Failed to upload image.";
        }
    } else {
        echo "<br>File is not an image.";
    }

    // ----------------------------------------  ADD MARKS  ----------------------------------------
    if (isset($_POST['marks'])) {
        $marks = explode("\n", $_POST['marks']);
        echo "<h2>Subject Marks</h2>";
        echo "<table border=1>";
        echo "<tr><th>Subject</th><th>Marks</th></tr>";
        foreach ($marks as $mark) {
            list($subject, $score) = explode("|", $mark);
            echo "<tr><td>$subject</td><td>$score</td></tr>";
        }
        echo "</table>";
    }
    require 'pdf.php';
    downloadPdf($fname, $lname, $fullname, $email, $phone, $uploadFile);
    
}
?>
