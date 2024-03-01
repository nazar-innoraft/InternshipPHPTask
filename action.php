<?php

require 'pdf.php';
require 'connection.php';

// Getting input from submitted form.
if (isset($_POST['submit'])) {
  $fullName = $_POST['firstName'] . ' ' . $_POST['lastName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  // Upload image.
  $uploadDir = 'uploads/';
  $uploadFile = $uploadDir . basename($_FILES['image']['name']);
  move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
  $image = $uploadFile;

  // Prepare SQL statement to insert data.
  $sql = "INSERT INTO users (fullname, email, phone) VALUES ('$fullName', '$email', '$phone')";
  $conn->query($sql);
  // Close database connection.
  $conn->close();


  // Calling function to print PDF.
  getPdf($_POST['firstName'], $_POST['lastName'], $fullName, $image, $email, $phone, $_POST['marks']);
}
?>
