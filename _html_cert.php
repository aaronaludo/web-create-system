<?php
ob_start();  // Start output buffering

// Include TCPDF library
require_once('tcpdf/tcpdf.php');

// Path to existing image
$imagePath = 'assets/images/html_cert.png';

// Dynamic name
$name = $_POST['name'];  // Replace this with the dynamic name

// Create instance of TCPDF
$pdf = new TCPDF();

// Add a new page with the dynamic name
$pdf->AddPage('L', 'A4');

// Set the existing image as a background image
$pdf->Image($imagePath, 0, 0, 296, 210, '', '', '', false, 300, '', false, false, 0);

// Calculate the position to center the text horizontally and vertically
$textWidth = $pdf->GetStringWidth($name);
$x = (100 - $textWidth) / 2;  // Horizontal center
$y = 75;  // Vertical center

// Add the dynamic name as plain text
$pdf->SetFont('helvetica', '', 12); // Set font and size
$pdf->SetXY($x, $y); // Set the position
$pdf->Cell($textWidth, 10, $name, 0, 0, 'C'); // Output the text horizontally

// Clean (erase) the output buffer and turn off output buffering
ob_end_clean();

// Output the modified PDF to the browser
$pdf->Output('HTML_CERTIFICATE.pdf', 'D');

// Alternatively, save the modified PDF to a file
// $pdf->Output('path/to/save/output.pdf', 'F');
?>
