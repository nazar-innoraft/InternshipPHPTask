<?php
function downloadPdf($fname, $lname, $fullname, $email, $phone, $imgdir){    
    ob_start();
    require("fpdf/fpdf.php");
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","", 16);
    $pdf->Cell(0,10,"Form details",1,1,'C');
    $pdf->Cell(50,10,"First Name",1,0);
    $pdf->Cell(0,10,$fname,1,1);
    $pdf->Cell(50,10,"Last Name",1,0);
    $pdf->Cell(0,10,$lname,1,1);
    $pdf->Cell(50,10,"Full Name",1,0);
    $pdf->Cell(0,10,$fullname,1,1);
    $pdf->Cell(50,10,"E-mail",1,0);
    $pdf->Cell(0,10,$email,1,1);
    $pdf->Cell(50,10,"Phone",1,0);
    $pdf->Cell(0,10,$phone,1,1);
    $pdf->Image($imgdir, 70,90,80,100);

    $filename = $fullname.'.pdf';
    $pdf->output($filename, 'I');
    ob_end_flush();
}
?>
