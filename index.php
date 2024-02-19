<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form id="form" action="index.php" method="post">
        <label for="fname">First Name:</label> <br>
        <input type="text" name="fname" id="fname" pattern="[A-za-z]{2-20}" required> <br>
        <label for="lname">Last Name:</label> <br>
        <input type="text" name="lname" id="lname" pattern="[A-za-z]{2-20}" required> <br>
        
        <label for="fullname">Full Name:</label> <br>
        <input type="text" name="fullname" id="fullname" disabled required> <br>

        <label for="email">E-mail:</label> <br>
        <input type="email" name="email" id="email" required> <br>
        <label for="phone">Phone:</label> <br>
        <input type="tel" name="phone" id="phone" pattern="[6-9]{1}[2-9]{1}[0-9]{8}" required> <br>
        <br>
        <input type="submit" name="submit"> <br> <br>
        <?php
            if(isset($_POST["submit"])){
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                echo "<h2>Hi, ", $fname,  " ", $lname, "</h2><br>Your email is ", $email, "<br>Your Phonr Number is ", $phone;
            }
        ?>
    </form>

    <!-- JAVASCRIPT -->
    <script src="script.js"></script>
</body>

</html>