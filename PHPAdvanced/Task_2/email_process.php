<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
require "email_credential.php";

/**
 * This function used to send email to given recipient with given subject and message.
 *
 * @param  string $recipient_email
 *  Recipient's email address.
 * @param  string $recipient_name
 *  Recipient's name.
 * @param  string $subject
 *  Email subject.
 * @param  string $message
 *  Main message to send in email.
 *
 * @return void
 */
function send_email (string $recipient_email, string $recipient_name, string $subject, string $message): void {
  $mail = new PHPMailer(true);
  global $sender_email, $sender_name, $sender_password, $email_host;
  try {
    // Server settings.
    $mail->isSMTP();
    $mail->Host = $email_host;
    $mail->SMTPAuth = true;
    $mail->Username = $sender_email;
    $mail->Password = $sender_password;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender.
    $mail->setFrom($sender_email, $sender_name);
    // Add a recipient.
    $mail->addAddress($recipient_email, $recipient_name);
    $mail->addReplyTo($sender_email, $sender_name);

    $mail->isHTML(true);
    // Set email subject.
    $mail->Subject = $subject;
    // Set email message.
    $mail->Body = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // Print summary.
    echo nl2br("Hello, ". $recipient_name. "\r\n". $message. "\r\n is sent to ". $recipient_email);
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
