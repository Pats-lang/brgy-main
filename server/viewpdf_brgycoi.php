<?php
// Ensure no whitespace or HTML output before <?php tag

require_once('../plugins/TCPDF-main/tcpdf.php');

// Ensure no output sent before generating PDF

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
// Set position for the "Prepared By:" text
$pdf->SetXY(452, 410); // Adjust X and Y coordinates as needed
// Output the "Prepared By:" text
$pdf->Cell(0, 0, 'Prepared By:', 0, 0, 'L');

$pdf->SetXY(440, 430); // Adjust X and Y coordinates as needed

$pdf->Cell(0, 0, 'Jayne B. Soriano', 0, 0, 'L'); // Output the name

$pdf->SetXY(460, 450); // Adjust X and Y coordinates as needed

$pdf->Cell(0, 0, 'Secretary', 0, 0, 'L'); // Output the role

$pdf->SetXY(452, 410); // Adjust X and Y coordinates as needed
// Output the "Prepared By:" text
$pdf->Cell(0, 0, 'Prepared By:', 0, 0, 'L');

$pdf->SetXY(440, 430); // Adjust X and Y coordinates as needed

$pdf->Cell(0, 0, 'Jayne B. Soriano', 0, 0, 'L'); // Output the name

$pdf->SetXY(460, 450); // Adjust X and Y coordinates as needed

$pdf->Cell(0, 0, 'Secretary', 0, 0, 'L'); // Output the role

$pdf->SetXY(450, 500); // Adjust X and Y coordinates as needed

$pdf->Cell(0, 0, 'Approved By:', 0, 0, 'L'); // Output the role




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

  



  p{

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
    <h1 style='margin-top:5px;'><u>Certificate of Indigency</u></h1>
  </div>

  <p>TO WHOM IT MAY CONCERN:</p> 
  <p>This to certify that Mrs/Mr: <b><u>{}</u></b> a resident at <u>{}</u> and residing in the aforementioned Barangay for {} year/s belongs to one of the many indigent families of the above-named barangay, the income of his/her family is barely enough to meet their day-to-day needs.  His/her situation in life will not allow them to engage in any services in relative to their immediate needs </p>
  <p>This certification is issued upon request of <u>{}</u> that he/she can avail free services and for his/her <u>{}</u></p>
  <p>Done in the City of Caloocan, Metro Manila this <u>{}</u></p>


  <div></div>
  


</div>
";

$pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF to the browser and not force download
$pdf->Output('example.pdf', 'I');

// Ensure no output sent after generating PDF
?>