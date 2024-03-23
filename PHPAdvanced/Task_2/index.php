<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Send Email</title>
</head>

<body>
  <div class="container">
    <!-- Taking user input to send email. -->
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
    <p id="output">
      <?php

      require_once 'email_process.php';
      require_once 'email_validation.php';

      if (isset($_POST['submit'])) {
        if (email_check($_POST['email'])) {
          // Function call to send email.
          send_email($_POST['email'], $_POST['fullName'], $_POST['subject'], $_POST['message']);
        } else {
          echo 'Email is not correct.';
        }
      }
      ?>
    </p>
  </div>
</body>

</html>
