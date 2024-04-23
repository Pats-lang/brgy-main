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

  



  .sentence{

    text-align: justify;

  }

  .prepared {
    text-align: center;
  }


  h3, h2, h1 {
    text-align: center;
  }

  .underline {
    border-bottom: 1px solid black; /* You can adjust the color and thickness */
    display: inline-block; /* Ensures that the underline only spans the width of the text */
    margin-bottom: 5px; /* Adjust as needed */
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
  <p class='sentence'>This to certify that Mrs/Mr: <b><u>{}</u></b> a resident at <u>{}</u> and residing in the aforementioned Barangay for {} year/s belongs to one of the many indigent families of the above-named barangay, the income of his/her family is barely enough to meet their day-to-day needs.  His/her situation in life will not allow them to engage in any services in relative to their immediate needs </p>
  <p class='sentence'>This certification is issued upon request of <u>{}</u> that he/she can avail free services and for his/her <u>{}</u></p>
  <p class='sentence'>Done in the City of Caloocan, Metro Manila this <u>{}</u></p>
  <div style='margin-top: 20px;'></div>

  <p class='prepared'>Prepared By:</p>
  <p class='underline'>Jayne B. Soriano</p> 
  <p class='position'>Secretary</p>

  <div></div>
  
  <p>Approved By:</p>
  <p class='underline'>Hon. ROEL A. ESMANA</p>
  <p class='position'>Barangay Chairman</p>


</div>
";

$pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF to the browser and not force download
$pdf->Output('example.pdf', 'I');

// Ensure no output sent after generating PDF
?>