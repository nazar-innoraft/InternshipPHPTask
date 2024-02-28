<?php

require 'pdf.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fName = $_POST['fname'];
    $lName = $_POST['lname'];
    $fullName = $fName . ' ' . $lName;
    $email = $_POST['email'];
    $phone = $_POST['phone'];


    // Email vallidation.
    // require 'emailvalidation.php';
    // $res = emailVal($email);

    // Image Upload.
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);

    move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
    $image = $uploadFile;

    getPdf($fName, $lName, $fullName, $image, $email, $phone);
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>Hello, <?= $fullName ?></h2>
        <p>Your email is <?= $email ?>
        <p>
        <p>Your phone number is <?= $phone ?>
        <p>
    </div>
</body>

</html>

