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
  <title>Page4</title>
</head>

<body>
  <p>4. Add a new text field to the above form to accept the phone number from the user. The number will belong to an Indian user. So, the number should begin with +91 and not be more than 10 digits.
  <p>
</body>

</html>
