<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';
require '../PHPAdvanced/Task_2/email_credential.php';

/**
 * This function sends reset link email.
 *
 * @param  mixed $recipient_email
 *  User's email.
 * @param  mixed $token
 *  System generated unique token for validation.
 *
 * @return void
 */
function send_email (string $recipient_email, string $token): void
{
  $mail = new PHPMailer(true);
  global $senderEmail, $senderPassword;
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
    $mail->addAddress($recipient_email);
    $mail->addReplyTo($senderEmail, 'Nazar');

    $mail->isHTML(true);
    // Set email subject.
    $mail->Subject = "Reset password link";
    // Set email message.
    $mail->Body = <<<END
      Click <a href= "http://localhost/InternshipPHPTask/PHPMySql2/reset_password.php?token={$token}">here</a> to reset password.
    END;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // Print summary.
  } catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
  }

}
