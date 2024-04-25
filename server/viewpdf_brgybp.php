<?php
// Ensure no whitespace or HTML output before <?php tag

require_once('../plugins/TCPDF-main/tcpdf.php');
require_once '../plugins/phpqrcode/qrlib.php'; // Include the necessary files for QR code generation

// Ensure no output sent before generating PDF

// Generate unique IDs for each dynamic data
$uniqueID1 = uniqid();
$uniqueID2 = uniqid();

// Dynamic data to be included in the QR code
$dynamicData1 = 'Dynamic Data 1: ' . $uniqueID1;
$dynamicData2 = 'GENERATED FILE: BARANGGAY CERTIFICATE ' ;

// Combine both dynamic data fields
$combinedDynamicData = $dynamicData1 . "\n" . $dynamicData2;

// Path to save the generated QR code image
$filename = 'qrcode_' . $uniqueID1 . '_' . $uniqueID2 . '.png';

// QR code size (1 to 10, default is 3)
$size = 5;

// Error correction level (L, M, Q, H)
$errorCorrectionLevel = 'L';

// Generate QR code and save the image
QRcode::png($combinedDynamicData, $filename, $errorCorrectionLevel, $size);

// Create a TCPDF object
$pdf = new TCPDF('P', 'px', 'A4', true, 'UTF-8');

// Disable the header and footer
$pdf->setPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->SetAutoPageBreak(true, 10);

// Set metadata
$pdf->SetCreator('Barangay 20');
$pdf->SetAuthor('Barangay 20');
$pdf->SetTitle('Barangay Certificate');
$pdf->SetSubject('Barangay Certificate');

// Add a page
$pdf->AddPage();

$pdf->SetMargins(50, 2, 50, 2); // Left, Top, Right, Bottom

$pdf->SetFont('times', '', 12);

$imagePath1 = 'https://i.ibb.co/FDDd78V/caloocan.jpg'; // Replace with the actual path to your first image file
$pdf->Image($imagePath1, $x1 = 70, $y1 = 60, $w1 = 75, $h1 = 75, '', '', '', false, 300, '', false, false, false, false, false, false);

$imagePath2 = 'https://i.ibb.co/dfT9dz7/barangay.jpg'; // Replace with the actual path to your first image file
$pdf->Image($imagePath2, $x1 = 450, $y1 = 55, $w1 = 85, $h1 = 85, '', '', '', false, 300, '', false, false, false, false, false, false);

// Set position for the QR code image on the right side, aligned with the Secretary
$imagePath3 = $filename;
$qrCodeWidth = 100; // Adjust QR code width as needed
$qrCodeHeight = 100; // Adjust QR code height as needed
$y2 = 480; // Y-coordinate aligned with Secretary
$x2 = 535 - $qrCodeWidth; // Adjust the X-coordinate to align with Secretary
$pdf->Image($imagePath3, $x2, $y2, $qrCodeWidth, $qrCodeHeight, '', '', '', false, 300, '', false, false, false, false, false, false);

$pdf->SetXY(65, 480); // Adjust X and Y coordinates as needed

$pdf->Cell(0, 0, 'Secretary', 0, 0, 'L'); // Output the role

$pdf->SetXY(60, 585); // Adjust X and Y coordinates as needed

$pdf->Cell(0, 0, 'Barangay Chairman', 0, 0, 'L'); // Output the role

$pdf->SetXY(30, 0);
// Dynamic HTML content (replace with your dynamic data)
$html = "
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<style>
body {
    height: 100vh;
    box-sizing: border-box;
}

.logo {
    width: 50px; /* Set the width to 100px */
    height: 50px; /* Set the height to 100px */
}

p {
    text-align: justify;
}

h3, h2, h1 {
    text-align: center;
}
</style>
</head>
<body>

<div style='display: flex; align-items: center; justify-content: center;'>

  <div>
    <h3>Republic of the Philippines</h3>
    <h3>City of Caloocan</h3>
    <h2>BARANGAY 20, ZONE 2, DISTRICT II</h2>
    <h1 style='margin-top:5px;'><u>BARANGAY BUILDING PERMIT</u></h1>
  </div>

  <p>TO WHOM IT MAY CONCERN:</p> 
  <p>This to permit is hereby granted to Mrs/Mr: <b><u>{}</u></b> a resident at <u>{}</u> and 
  provided  that the General Orders and ordinance of the Barangay
  are strictly obeyed and adhered. 
  
  <p>This certification is issued upon request of <u>{}</u> that he/she can operate to build for his/her <u>{}</u></p>
  <p>Done in the City of Caloocan, Metro Manila this <u>{}</u></p>

  <div></div>

  <p>Prepared By:</p>
  <br>
  <p>Jayne B. Soriano</p>

<div></div>
<div></div>
<p>Approved By:</p>
<div></div>
<p>Hon. ROEL A. ESMANA</p>
</div>

</body>
</html>
";

$pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF to the browser and not force download
$pdf->Output('example.pdf', 'I');

// Ensure no output sent after generating PDF
?>