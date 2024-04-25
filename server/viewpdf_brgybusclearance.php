<?php
session_start();
include '../config/connection.php';
require_once('../plugins/TCPDF-main/tcpdf.php');
require_once '../plugins/phpqrcode/qrlib.php'; // Include the necessary files for QR code generation

$response = array();

// Database query to fetch Barangay officials based on position
$officialsQuery = "SELECT `name_officials`, `position` FROM `officials` WHERE `position` = 'Barangay Captain' OR `position` = 'Barangay Secretary'";
$officialsResult = $db->query($officialsQuery);

// Check if officials data is retrieved successfully
if ($officialsResult->num_rows > 0) {
    // Initialize variables
    $barangayCaptain = '';
    $barangaySecretary = '';

    // Loop through the fetched data
    while ($row = $officialsResult->fetch_assoc()) {
        if ($row['position'] == 'Barangay Captain') {
            $barangayCaptain = $row['name_officials'];
        } elseif ($row['position'] == 'Barangay Secretary') {
            $barangaySecretary = $row['name_officials'];
        }
    }
} else {
    // Default names if no data found
    $barangayCaptain = "Juan Dela Cruz";
    $barangaySecretary = "Maria Santos";
}

// Database query to fetch data
$sql = "SELECT `id`, `member_id`, `transaction_id`, `business_name`, `owner_name`, 'kof_business', `request`, `contact_no`, `address`, `purpose`, `yrs_res`, `status`, `email`, `time` FROM `request_busclearance`";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        // Get the current day, month, and year
        $currentDay = date('j');
        $currentMonth = date('F');
        $currentYear = date('Y');

        // Add the ordinal suffix to the day
        if ($currentDay % 10 == 1 && $currentDay != 11) {
            $ordinalSuffix = 'st';
        } elseif ($currentDay % 10 == 2 && $currentDay != 12) {
            $ordinalSuffix = 'nd';
        } elseif ($currentDay % 10 == 3 && $currentDay != 13) {
            $ordinalSuffix = 'rd';
        } else {
            $ordinalSuffix = 'th';
        }

        $currentDate = date('F j, Y');
        // Format the date string
        $formattedDate = $currentDay . $ordinalSuffix . " day of " . $currentMonth . ", " . $currentYear;

        // Ensure no output sent before generating PDF
        ob_start();

        // Generate unique IDs for each dynamic data
        $transaction_id =  $row['transaction_id'] ;
        $member_id = $row['member_id'] ;

        $dynamicData = 'GENERATED FILE: Barangay Business Clearance';
        // Dynamic data to be included in the QR code
        $dynamicData1 = 'Transaction ID: ' . $transaction_id;
        $dynamicData2 = 'Member ID: '. $member_id;
        $dynamicData3 = 'Date Created: '. $currentDate;

     
        $uniqueid = uniqid();
        // Combine both dynamic data fields
        $combinedDynamicData = $dynamicData . "\n" . $dynamicData1 . "\n" . $dynamicData2. "\n" . $dynamicData3;
        // QR code size (1 to 10, default is 3)
        $size = 10;
        // Error correction level (L, M, Q, H)
        $errorCorrectionLevel = 'L';

        $directory = '../assets/images/qr/'; // Specify the directory path
        $filename = 'qrcode_' . $uniqueid . '_' . $transaction_id . '.png';
        $filePath = $directory . $filename;
        // Generate QR code and save the image
        QRcode::png($combinedDynamicData, $filePath, $errorCorrectionLevel, $size);

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
        $qrCodeWidth = 100; // Adjust QR code width as needed
        $qrCodeHeight = 100; // Adjust QR code height as needed
        $y2 = 480; // Y-coordinate aligned with Secretary
        $x2 = 535 - $qrCodeWidth; // Adjust the X-coordinate to align with Secretary

        // Check if file was saved successfully
        if (file_exists($filePath)) {
            // Add the saved image to the PDF
            $pdf->Image($filePath, $x2, $y2, $qrCodeWidth, $qrCodeHeight, '', '', '', false, 300, '', false, false, false, false, false, false);
        } else {
            echo "Error: File could not be saved at: " . $filePath;
        }

        $pdf->SetXY(54, 470); // Adjust X and Y coordinates as needed
        $pdf->Cell(0, 0, 'Secretary', 0, 0, 'L'); // Output the role

        $pdf->SetXY(54  , 565); // Adjust X and Y coordinates as needed
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

        .indent {
            margin-left: 1.5em; /* Indentation for inline elements */
        }
        </style>
        </head>
        <body>

        <div style='display: flex; align-items: center; justify-content: center;'>

        <div>
            <h3>Republic of the Philippines</h3>
            <h3>City of Caloocan</h3>
            <h2>BARANGAY 20, ZONE 2, DISTRICT II</h2>
            <h1 style='margin-top:5px;'><u>Barangay Business Clearance</u></h1>
        </div>

        <p>TO WHOM IT MAY CONCERN:</p> 

        <p><span class='indent'>This to certify that Mrs/Mr: <b><i><u>" . $row['owner_name']
        . "
        </u></i></b> a resident at <b><i><u>" . $row['address'] . "</u></i></b> 
          Granted to operate business, practice of profession and privileges who have 
          completed with the existing Barangay ordinance, rules and regulation whose
          nature of business is <b><i><u>" . $row['business_name'] . "
          </u></i></b>   </p>  <p>This certification is issued 
          upon request of  <b><i><u>" . $row['owner_name']
          . "</u></i></b> that he/she can 
          avail free services and for his/her  <b><i><u>" . $row['purpose'] . "</u></i></b></p>
        <p>Done in the City of Caloocan, Metro Manila this  <b><i><u>" . $formattedDate . "</u><i></b> </p>

        <div></div>

        <p>Prepared By:</p>
        <div></div>
        
        <p>$barangaySecretary</p>
        <div></div>
        <p>Approved By:</p>
        <div></div>
        <p>$barangayCaptain</p>
        </div>

        </body>
        </html>
        ";

        $pdf->writeHTML($html, true, false, true, false, '');

        // Output the PDF to the browser and not force download
        $pdf->Output('example.pdf', 'I');
    }
} else {
    echo "0 results";
}
// Ensure no output sent after generating PDF

?>
