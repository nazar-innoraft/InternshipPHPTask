<?php

require 'pdf.php';
require 'connection.php';

// Getting input from submitted form.
if (isset($_POST['submit'])) {
  $fullName = $_POST['firstName'] . ' ' . $_POST['lastName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  // Image Upload.
  $uploadDir = 'uploads/';
  $uploadFile = $uploadDir . basename($_FILES['image']['name']);
  move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
  $image = $uploadFile;

  // Prepare SQL statement to insert data
  $sql = "INSERT INTO users (fullname, email, phone) VALUES ('$fullName', '$email', '$phone')";
  $conn->query($sql);
  // Close database connection
  $conn->close();


  /* * Generates pdf using user input data.
  *
  * @param string $firstName
  *   User's first name.
  * @param string $lastName
  *   User's last name.
  * @param string $fullName
  *   User's full name.
  * @param string $email
  *   User's email address.
  * @param string $phone
  *   User's contact number.
  * @param mixed $image
  *   User's input image.
  * @param string $marks
  *   User's subject marks.
  */
  getPdf($_POST['firstName'], $_POST['lastName'], $fullName, $image, $email, $phone, $_POST['marks']);
}
?>
