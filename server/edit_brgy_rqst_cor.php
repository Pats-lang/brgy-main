  <?php
  include '../config/connection.php';
  require_once('../plugins/TCPDF-main/tcpdf.php');
  session_start();

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  $response = array(
    
  );

  $edit_Id = sanitizeData(getDatabase(), $_POST['account']);
  $edit_lastModifiedAnnouncements = sanitizeData(getDatabase(), $_POST['status']);

  $name = sanitizeData(getDatabase(), $_POST['register_name']);
  $address = sanitizeData(getDatabase(), $_POST['register_address']);
  $name = sanitizeData(getDatabase(), $_POST['register_name']);
  $request = sanitizeData(getDatabase(), $_POST['register_request']);
  $purpose = sanitizeData(getDatabase(), $_POST['register_purpose']);
  $residency = sanitizeData(getDatabase(), $_POST['register_Residency']);
  $email = sanitizeData(getDatabase(), $_POST['register_email']);

  if ($preparedSql = $db->prepare("UPDATE `request_brgycor` SET `status`= ? WHERE id =? ")) {
      $preparedSql->bind_param("ii", $edit_lastModifiedAnnouncements, $edit_Id);

      if ($preparedSql->execute()) {
          $response['status'] = true;
          $response['message'] = 'Successfully updated details.'; 


          if ($edit_lastModifiedAnnouncements == 2) {  
          
      require '../plugins/PHPMailer/src/Exception.php';
      require '../plugins/PHPMailer/src/PHPMailer.php';
      require '../plugins/PHPMailer/src/SMTP.php';

          // Create a TCPDF object
    $pdf = new TCPDF('P', 'px', 'A4', true, 'UTF-8');

    // Disable the header
    $pdf->setPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->SetAutoPageBreak(true, 10);

    // Set metadata
    $pdf->SetCreator('Barangay 20');
    $pdf->SetAuthor('Barangay 20');
    $pdf->SetTitle('Barangay Certicate');
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
  $requesterName = $name;
  $requesterAddress = $address;
  $requesterYearsResiding = $residency;
  $requesterRequestor = $name;
  $requesterPurpose = $purpose;
  $requestDate = date("jS day of F, Y"); // Example: "16th day of October, 2023"

  $html = "
  <!DOCTYPE html>
  <html lang='en'>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <head>
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
  <div style='text-align: center;'>
        <h3>Republic of the Philippines</h3>
        <h3>City of Calocan</h3>
        <h2>BARANGAY 20, ZONE 2, DISTRICT II</h2>

   


      <h1 style='margin-top:5px;'><u>Certificate of Barangay Residency</u></h1>
</div>
     
<p>TO WHOM IT MAY CONCERN:</p> 

      <p class='sentence'>This to certify that Mrs/Mr: <b><u>{$requesterName}</u></b> a resident at <u>{$requesterAddress}</u> and residing in the aforementioned Barangay for {$requesterYearsResiding} year/s belongs to one of the many indigent families of the above-named barangay, the income of his/her family is barely enough to meet their day-to-day needs.  His/her situation in life will not allow them to engage in any services in relative to their immediate needs </p>

      <p class='sentence'>This certification is issued upon request of <u>{$requesterRequestor}</u> that he/she can avail free services and for his/her <u>{$requesterPurpose}</u></p>

      <p class='sentence'>Done in the City of Caloocan, Metro Manila this <u>{$requestDate}</u></p>
     
      <p>Prepared By:</p>

   
        <p class='underline'>Jayne B. Soriano</p>
        <p class='position'>Secretary</p>
      
<br>
     <p>Approved By:</p>

   
     <p class='underline'>Hon. ROEL A. ESMANA</p>
        <p class='position'>Barangay Chairman</p>
    

  </body>
  </html>
  ";




    $pdf->writeHTML($html, true, false, true, false, '');

    $tempFileName = tempnam(sys_get_temp_dir(), 'pdf');

    // Output the PDF to the browser and not force download
    $pdf->Output($tempFileName, 'F');


        
      $mail = new PHPMailer(true);

          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'barangay020@gmail.com';
          $mail->Password = 'bbcwbtiyfcxduefe';
          $mail->SMTPSecure = 'ssl';
          $mail->Port = 465;

              // Attach the PDF
              $mail->addAttachment($tempFileName, 'Barangay Residency.pdf');


          $mail->setFrom('barangay020@gmail.com');
        
          $mail->addAddress($email); // Replace with your actual email address
          $mail->Subject = 'Barangay Residency';
          $imageUrl = 'https://i.ibb.co/NC26SjV/barangay.gif';

          $mail->Body = '<html>
          <head>
              <style>
                  body {
                      font-family: \'Arial\', sans-serif;
                      background-color: #f4f4f4;
                      color: #333;
                      margin: 0;
                  }
          
                  table.container {
                    max-width: 600px;
                    width: 100%;
                    margin: 0 auto;
                    background-color: #EDE9E8;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                
                td.img-container {
                    background-image: url("https://i.ibb.co/Kz2fshy/410931164-1509662996487803-4024040495286225472-n.jpg");             
                      background-size: cover; /* Adjust as needed */
                       background-position: center; /* Adjust as needed */
                       padding: 100px;
                       border-radius: 5px 5px 0px 0px;
                       text-align: center;
                   
                   }
        
                   
                  img {
                      width: 100px;
                      height: 100px;
                  }
          
                  td.form-details {
                      text-align: center;
                      border-radius: 0px 0px 5px 5px;
                      background-color: #FFF;
                      padding: 25px;
                  }
              </style>
          </head>
          <body>
              <table class="container">
              <tr>
              <td class="img-container"></td>
          </tr>
                  <tr>
                      <td class="form-details">
                          <h2>Contact Form Submission</h2>
                        
                          <p><strong>Email: </strong>' . $email . '</p>
                        
                      </td>
                  </tr>
              </table>
          </body>
          </html>';

          $mail->isHTML(true);

          $mail->send();

          http_response_code(200); // OK
          $response['status'] = true;
          $response['message'] = 'Successfully updated barangay request details.'; 



      unlink($tempFileName);
          }

      } else {
          $response['status'] = false;
          $response['message'] = "Failed to update announcement information: " . $preparedSql->error;
          http_response_code(500); // Internal Server Error
      }
      $preparedSql->close();



  } else {
      $response['status'] = false;
      $response['message'] = " ~ An error occurred while preparing the UPDATE statement:" . $preparedSql->error . " ~ ";
      http_response_code(500); // Internal Server Error
  }

  echo json_encode($response);
  ?>