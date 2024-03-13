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
  <p>2. Add a new field to accept user image in addition to the above fields. On submit store the image in the backend and display it with the full name below it.</p>
</body>
</html>
