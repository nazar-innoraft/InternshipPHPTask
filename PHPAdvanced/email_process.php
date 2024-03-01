<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';
require 'email_credential.php';

/**
 * sendEmail function used to send email to given recipient with given subject and message.
 *
 * @param  mixed $recipient_email
 * @param  mixed $recipient_name
 * @param  mixed $subject
 * @param  mixed $message
 * @return void
 */
function sendEmail (string $recipient_email, string $recipient_name, string $subject, string $message) {
  $mail = new PHPMailer(true);
  try {
    // Server settings.
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $senderEmail;
    $mail->Password = $senderPassword;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender.
    $mail->setFrom($senderEmail, 'Nazar');
    // Add a recipient.
    $mail->addAddress($recipient_email, $recipient_name);
    $mail->addReplyTo($senderEmail, 'Nazar');

    $mail->isHTML(true);
    // Set email subject.
    $mail->Subject = $subject;
    // Set email message.
    $mail->Body = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
