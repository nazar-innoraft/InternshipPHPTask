<?php

use Fpdf\Fpdf;

require('vendor/autoload.php');

/*
 * Generates pdf using user input data.
 *
 * @param string $firstName
 *   User's first name.
 * @param string $lastName
 *   User's last name.
 * @param string $fullName
 *   User's full name.
 * @param string $image
 *   User's image.
 * @param string $email
 *   User's email.
 * @param string $number
 *   User's contact number.
 * @param string $marks
 *   User's subject marks.
 *
 * @return void
 */
function get_pdf(string $firstName, string $lastName, string $fullName, mixed $image, string $email, string $phone, string $markString): void {
  $pdf = new Fpdf();
  $pdf->AddPage();
  // Prints personal Details.
  $pdf->SetFont("Arial", "B", 20);
  $pdf->Cell(0, 10, "Personal details", 0, 1, 'C');
  $pdf->SetFont("Arial", "", 16);
  $pdf->Cell(50, 10, "First Name", 1, 0);
  $pdf->Cell(0, 10, $firstName, 1, 1);
  $pdf->Cell(50, 10, "Last Name", 1, 0);
  $pdf->Cell(0, 10, $lastName, 1, 1);
  $pdf->Cell(50, 10, "Full Name", 1, 0);
  $pdf->Cell(0, 10, $fullName, 1, 1);
  $pdf->Cell(50, 10, "E-mail", 1, 0);
  $pdf->Cell(0, 10, $email, 1, 1);
  $pdf->Cell(50, 10, "Phone", 1, 0);
  $pdf->Cell(0, 10, $phone, 1, 1);
  $pdf->Cell(0, 10, "", 0, 1);
  // Prints subject name along with it's marks.
  $pdf->SetFont("Arial", "B", 20);
  $pdf->Cell(0, 10, "Academic Details", 0, 1, 'C');
  $pdf->SetFont("Arial", "", 16);
  $pdf->Cell(100, 10, "Subject", 1, 0);
  $pdf->Cell(0, 10, "Marks", 1, 1);
  $marks = explode("\n", $markString);
  foreach ($marks as $mark) {
    list($subject, $score) = explode("|", $mark);
    $pdf->Cell(100, 10, $subject, 1, 0);
    $pdf->Cell(0, 10, $score, 1, 1);
  }
  // Adding an image.
  $pdf->Image($image, 70, 190, 80, 100);
  $dir = 'docs/';
  $filename = $email . '.pdf';

  // Making final output of pdf.
  $pdf->Output($dir . $filename, 'I');
}
