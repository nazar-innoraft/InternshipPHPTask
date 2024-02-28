<?php

use Fpdf\Fpdf;
require('vendor/autoload.php');
if ($_POST["submit"]) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $fullname = $fname . " " . $lname;
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $uploadDir = "uploads/";
    $imgdir = $uploadDir . basename($_FILES["image"]["name"]); 
    if($_FILES["image"]["tmp_name"]){
        $check = getimagesize($_FILES["image"]["tmp_name"]);
    }  
    // ob_start();
    $pdf = new Fpdf();
    $pdf->AddPage();
    $pdf->SetFont("Arial", "", 16);
    $pdf->Cell(0, 10, "Form details", 1, 1, 'C');
    $pdf->Cell(50, 10, "First Name", 1, 0);
    $pdf->Cell(0, 10, $fname, 1, 1);
    $pdf->Cell(50, 10, "Last Name", 1, 0);
    $pdf->Cell(0, 10, $lname, 1, 1);
    $pdf->Cell(50, 10, "Full Name", 1, 0);
    $pdf->Cell(0, 10, $fullname, 1, 1);
    $pdf->Cell(50, 10, "E-mail", 1, 0);
    $pdf->Cell(0, 10, $email, 1, 1);
    $pdf->Cell(50, 10, "Phone", 1, 0);
    $pdf->Cell(0, 10, $phone, 1, 1);
    // $pdf->Image($imgdir, 70, 90, 80, 100);

    $filename = $fullname . '.pdf';
    $pdf->output();
    // ob_end_flush();
}
