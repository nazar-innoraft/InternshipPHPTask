<?php

require_once 'valid_check.php';

// Check if the user is logged in or not, if not then dont show the content.
if (!check_valid()) {
  include 'access_denied.html';
  die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page1</title>
</head>

<body>
  <ul>
    <li>
      1. Create a form with below fields:
      <ul>
        <li>First Name - User will input only alphabets1</li>
        <li>Last Name - User will input only alphabets</li>
        <li>Full name: User cannot enter a value in Full name field. It will be disabled by default. When the first name and last name fields are filled, this field outputs the sum of the above 2 fields.</li>
      </ul>
    </li>
    <li>
      Submit Button:
      <ul>
        <li>On submit, the form gets submitted and the page will reload</li>
        <li>Hello [full-name] will appear on the page</li>
      </ul>
    </li>
  </ul>
</body>

</html>
