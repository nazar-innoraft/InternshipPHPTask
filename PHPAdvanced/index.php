<?php


if (isset($_POST['submit'])) {
  $recipientEmail = $_POST['email'];
  $recipientName = $_POST['fullName'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  sendEmail($_POST['email'], $_POST['fullName'], $_POST['subject'], $_POST['message']);


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="../css/style2.css"> -->
  <link rel="stylesheet" href="css/style.css">
  <title>Send Email</title>
</head>

<body>
  <div class="container">
    <!-- Taking input from user. -->
    <form method="post">
      <label for="fullName">Enter your name:</label>
      <input type="text" name="fullName">
      <label for="email">Enter your email:</label>
      <input type="email" name="email">
      <label for="subject">Enter subject of the message:</label>
      <input type="text" name="subject">
      <label for="message">Enter your message:</label>
      <textarea name="message" id="message" cols="30" rows="10"></textarea>
      <!-- Submit button to submit the form. -->
      <input type="submit" id="submit" name="submit">
    </form>
  </div>
</body>

</html>
