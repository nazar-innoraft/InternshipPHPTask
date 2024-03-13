<?php

require_once '../valid_check.php';

// Check if the user is logged in or not, if not then dont show the content.
if (!check_valid()) {
  include '../access_denied.html';
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
  <ul>
    <li>
      <ul>
        Email Syntax check:
        <li>User will enter email id and on submit, check if correct email id syntax has been used.</li>
        <li>Show a message on successful email syntax or show an error message on the wrong syntax.</li>
      </ul>
    </li>
    <ul>
      Valid Email id Check:
      <li>User will enter email id and on submit, use the following site http://www.mailboxlayer.com/ to check if the entered email id is valid.</li>
    </ul>
  </ul>
</body>
</html>
