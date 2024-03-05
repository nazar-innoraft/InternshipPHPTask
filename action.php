<?php

require 'pdf.php';
require 'connection.php';
require 'valid_marks.php';

// Getting input from submitted form.
if (isset($_POST['submit'])) {
  $full_name = $_POST['firstName'] . ' ' . $_POST['lastName'];

  // Upload image.
  $uploadDir = 'uploads/';
  $image = $uploadDir . basename($_FILES['image']['name']);
  move_uploaded_file($_FILES['image']['tmp_name'], $image);


  if (!valid_mark($_POST['marks'])) {
    die("Invalid Marks format");
  }

  // Prepare SQL statement to insert data.
  $sql = "INSERT INTO users (fullname, email, phone) VALUES ('$full_name', '{$_POST['email']}', '{$_POST['phone']}')";
  $conn->query($sql);
  // Close database connection.
  $conn->close();


  // Calling function to print PDF.
  get_pdf($_POST['firstName'], $_POST['lastName'], $full_name, $image, $_POST['email'], $_POST['phone'], $_POST['marks']);
}
?>
