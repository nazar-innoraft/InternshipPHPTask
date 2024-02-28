<?php

use Fpdf\Fpdf;
require('vendor/autoload.php');
function getPdf($fName, $lName, $fullName, $image, $email, $phone){
    $pdf = new Fpdf();
    $pdf->AddPage();
    $pdf->SetFont("Arial", "", 16);
    $pdf->Cell(0, 10, "Form details", 1, 1, 'C');
    $pdf->Cell(50, 10, "First Name", 1, 0);
    $pdf->Cell(0, 10, $fName, 1, 1);
    $pdf->Cell(50, 10, "Last Name", 1, 0);
    $pdf->Cell(0, 10, $lName, 1, 1);
    $pdf->Cell(50, 10, "Full Name", 1, 0);
    $pdf->Cell(0, 10, $fullName, 1, 1);
    $pdf->Cell(50, 10, "E-mail", 1, 0);
    $pdf->Cell(0, 10, $email, 1, 1);
    $pdf->Cell(50, 10, "Phone", 1, 0);
    $pdf->Cell(0, 10, $phone, 1, 1);
    $pdf->Image($image, 70, 90, 80, 100);
    $dir = 'docs/';
    $filename = $email . '.pdf';
    $pdf->Output("$dir.$filename",'F');
    $pdf->output();
}
