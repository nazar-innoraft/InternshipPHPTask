<?php

require_once 'valid_check.php';

// Check if the user is logged in or not, if not then dont show the content.
if (!check_valid()) {
  include '../access_denied.html';
  die();
}
?>

<!DOCTYPE html>
<html lang="en">

<body>
  <p class="questions">5. Add a new single text field to the above form that will accept email id. Do not use email id input field type. </p>
</body>

</html>
