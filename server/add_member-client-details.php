<?php
include '../config/connection.php';
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$response = array(
    'status' => true,
    'icon' => '',
    'message' => '',
    'count' => 0,
);
// personal_information
$uploadDirectory = "../assets/images/member_pictures/";
$pictureName = $_FILES['register_picture']['name'];
$pictureTmpName = $_FILES['register_picture']['tmp_name'];




$allowedExtensions = ['jpg', 'jpeg', 'png'];
$pictureExtension = strtolower(pathinfo($pictureName, PATHINFO_EXTENSION));


if (!in_array($pictureExtension, $allowedExtensions) || !in_array($pictureExtension, $allowedExtensions)) {
    $response['false'] = false;
    $response['icon'] = "error";
    $response['message'] = "Only JPEG & PNG images is allowed.";
}
$uploadedPicturePath = $uploadDirectory . $pictureName;


move_uploaded_file($pictureTmpName, $uploadedPicturePath);



$register_memberId = sanitizeData(getDatabase(), $_POST['register_memberId']);
$register_precinctNo = sanitizeData(getDatabase(), $_POST['register_precinctNo']);
$register_lastname = sanitizeData(getDatabase(), $_POST['register_lastname']);
$register_firstname = sanitizeData(getDatabase(), $_POST['register_firstname']);
$register_middlename = sanitizeData(getDatabase(), $_POST['register_middlename']);
$register_surfix = sanitizeData(getDatabase(), $_POST['register_surfix']);
$register_birthDate = sanitizeData(getDatabase(), $_POST['register_birthDate']);
$register_address = sanitizeData(getDatabase(), $_POST['register_address']);
$register_emailAddress = sanitizeData(getDatabase(), $_POST['register_emailAddress']);
$register_cellNo = sanitizeData(getDatabase(), $_POST['register_cellNo']);
$register_religion = sanitizeData(getDatabase(), $_POST['register_religion']);
$register_status = sanitizeData(getDatabase(), $_POST['register_status']);
$register_yearToday = sanitizeData(getDatabase(), $_POST['register_yearToday']);
$register_memberCount = sanitizeData(getDatabase(), $_POST['register_memberCount']);
$register_campusId = sanitizeData(getDatabase(), $_POST['register_campusId']);
$fullname = $register_lastname . ', ' . $register_firstname . ' ' . $register_middlename;
$cid = 1;
$status= 0;

if ($prepared_membersSql = $db->prepare("INSERT INTO `members` (`member_id`, `year`, `member_count`, `campus_id`, `fullname`, `lastname`, `firstname`,`middlename`,`surfix`,`precinct`, `birth_date` , `address`, `civil_status`, `religion`, `email_address`, `cellphone_no`, `picture`, `cid`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
    $prepared_membersSql->bind_param(
        "isissssssssssssssii",
        $register_memberId,
        $register_yearToday,
        $register_memberCount,
        $register_campusId,
        $fullname,
        $register_lastname,
        $register_firstname,
        $register_middlename,
        $register_surfix,
        $register_precinctNo,
        $register_birthDate,
        $register_address,
        $register_status,
        $register_religion,
        $register_emailAddress,
        $register_cellNo,
        $pictureName,
        $cid,
        $status
        
        
    );
    if (!$prepared_membersSql->execute()) {
        $response['false'] = false;
       $response['message'] ="Error executing Personal Information SQL statement: " . $prepared_membersSql->error;
    }
    $prepared_membersSql->close();
} 

// address
$register_addResidency = (array)$_POST['register_addResidency'];
$register_addYears = (array)$_POST['register_addYears'];


for ($i = 0; $i < count($register_addResidency); $i++) { //Using any open failed to count the maximum count of rows.
    $residency = sanitizeData(getDatabase(), $register_addResidency[$i]);
    $yrs_res = sanitizeData(getDatabase(), $register_addYears[$i]);
  

    if ($prepared_membersWorkSql = $db->prepare("INSERT INTO `member_address` (`member_id`, `residency`, `yrs_res`) VALUES (?, ?, ?)")) {
        $prepared_membersWorkSql->bind_param("iss", $register_memberId, $residency, $yrs_res);
        if (!$prepared_membersWorkSql->execute()) {
            $response['false'] = false;
           $response['message'] ="Error executing Work Experience SQL statement:" . $prepared_membersWorkSql->error;
        }
        $prepared_membersWorkSql->close();
    } 
}

// Emergency
$register_emergencyName = $_POST['register_emergencyName'];
$register_emergencyContact = $_POST['register_emergencyContact'];

for ($i = 0; $i < count($register_emergencyName); $i++) {
    $contact_name = sanitizeData(getDatabase(), $register_emergencyName[$i]);

    $contact_no = sanitizeData(getDatabase(), $register_emergencyContact[$i]);



    if ($prepared_trainingsSql = $db->prepare("INSERT INTO `member_emergency` (`member_id`, `contact_name`, `contact_no`) VALUES (?, ?, ?)")) {
        $prepared_trainingsSql->bind_param("iss", $register_memberId, $contact_name,  $contact_no);
        if (!$prepared_trainingsSql->execute()) {
            $response['false'] = false;
           $response['message'] ="Error executing Trainings SQL statement:" . $prepared_trainingsSql->error;
        }
        $prepared_trainingsSql->close();
    } else {
       $response['message'] ="An error occurred while preparing the Trainings SQL statement:" . $prepared_trainingsSql->error;
    }
}

// Proof
$uploadDirectory = "../assets/images/proof-pictures/";

$proofIdName = $_FILES['register_proofId']['name'];
$proofIdTmpName = $_FILES['register_proofId']['tmp_name'];
$proofResidencyName = $_FILES['register_proofResidency']['name'];
$proofResidencyTmpName = $_FILES['register_proofResidency']['tmp_name'];

$allowedExtensions = ['jpg', 'jpeg', 'png'];

$proofIdExtension = [];
foreach($proofIdName as $name) {
    $proofIdExtension[] = strtolower(pathinfo($name, PATHINFO_EXTENSION));
}

$proofResidencyExtension = [];
foreach($proofResidencyName as $name) {
    $proofResidencyExtension[] = strtolower(pathinfo($name, PATHINFO_EXTENSION));
}
if (!in_array($proofIdExtension, $allowedExtensions) || !in_array($proofResidencyExtension, $allowedExtensions)) {
    $response['false'] = false;
    $response['icon'] = "error";
    $response['message'] = "Only JPEG & PNG images is allowed.";
}

for ($i = 0; $i < count($proofIdName); $i++) {
    $uploadedProofIdPath = $uploadDirectory . $proofIdName[$i];
    $uploadedProofPath = $uploadDirectory . $proofResidencyName[$i];
    
    move_uploaded_file($proofIdTmpName[$i], $uploadedProofIdPath);
    move_uploaded_file($proofResidencyTmpName[$i], $uploadedProofPath);
}


   

if ($prepared_proofSql = $db->prepare("INSERT INTO `member_proof` (`member_id`, `valid_id`, `proof_residency`) VALUES (?, ?, ?)")) {
    $prepared_proofSql->bind_param("iss", $register_memberId, $uploadedProofIdPath, $uploadedProofPath);
    if (!$prepared_proofSql->execute()) {
        $response['false'] = false;
       $response['message'] ="Error executing Affililiations SQL statement:" . $prepared_proofSql->error;
    }
        $prepared_proofSql->close();
    } else {
       $response['message'] ="An error occurred while preparing the Affililiations SQL statement:" . $prepared_proofSql->error;
    }

//account
    $register_accountUser = $_POST['register_accountUser'];
    $register_accountPassword = $_POST['register_accountPassword'];
    
    for ($i = 0; $i < count($register_accountUser); $i++) {
        $username = sanitizeData(getDatabase(), $register_accountUser[$i]);
        $password = sanitizeData(getDatabase(), $register_accountPassword[$i]);
        $register_accountPassword_hashed = password_hash($password, PASSWORD_DEFAULT); // Hash the password here
    
        if ($prepared_achievementsSql = $db->prepare("INSERT INTO `member_account` (`member_id`, `username`, `password`) VALUES (?, ?, ?)")) {
            $prepared_achievementsSql->bind_param("iss", $register_memberId, $username, $register_accountPassword_hashed);
            if (!$prepared_achievementsSql->execute()) {
                $response['false'] = false;
                $response['message'] ="Error executing Achievements SQL statement:" . $prepared_achievementsSql->error;
            }
            $prepared_achievementsSql->close();
        } else {
            $response['message'] ="An error occurred while preparing the Achievements SQL statement:" . $prepared_achievementsSql->error;
        }
    }







if ($response['status']) {
    $response['icon'] = "success";
    $response['message'] = "You are now a Registered BARANGAY 20!
    Please check your email to monitor/track the status of your account registration.
    ";

    // Send email using PHPMailer

    require '../plugins/PHPMailer/src/Exception.php';
    require '../plugins/PHPMailer/src/PHPMailer.php';
    require '../plugins/PHPMailer/src/SMTP.php';
           
        $mail = new PHPMailer(true);
    
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'miscsd.ucc@gmail.com';
        $mail->Password = 'vcnz kkoo ekoi lqpy';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
    
        $mail->setFrom('miscsd.ucc@gmail.com', 'BARANGAY 20');
        $mail->addAddress($register_emailAddress);
        $mail->isHTML(true);
        
        $mail->Subject = "Account Registration  ";

        
        $mail->Body = "<html>
        <head>
            <style>
                /* Add your CSS styles here */
                body {
                    font-family: Arial, sans-serif;
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
                background-image: url('https://i.ibb.co/Y8L9Gkn/barangay20-header.png'); 
                   background-size: cover; /* Adjust as needed */
                   background-position: center; /* Adjust as needed */
                   padding: 100px;
                   border-radius: 5px 5px 0px 0px;
                   text-align: center;
               
               }
               
       
               td.form-details {
                  
                   border-radius: 0px 0px 5px 5px;
                   background-color: #FFF;
                   padding: 20px;
               }
               .footer {
                   background-color: #f2f2f2;
                   text-align: center;
                   padding: 20px;
                   border-radius: 0 0 10px 10px;
                   font-size: 12px;
               }
               .footer p {
                   margin: 0;
                   padding: 0;
               }
               .footer a {
                   color: #005ea5;
                   text-decoration: none;
               }
               .otp-code {
                   background-color: #f5f5f5;
                   border-radius: 5px;
                   padding: 10px;
                  
                   text-align: center;
                   margin-bottom: 30px;
               }
               
               .footer p {
                   margin: 0;
                   padding: 0;
               }
               .footer a {
                   color: #005ea5;
                   text-decoration: none;
               }
               @media (max-width: 768px) {
                   /* Adjust styles for smaller screens (e.g., email) */
                   td.img-container {
                     width: 100%;
                     height: 100%;
                     padding: 50px; /* Adjust as needed for smaller screens */
                   }
                 }          
            </style>
        </head>
        <body>
        <table class='container'>
           <tr>
               <td class='img-container'>
               </td>
           </tr>
           <tr>
               <td class='form-details'>
               <h2>Greetings {$register_lastname} {$register_firstname} {$register_middlename}!</h2>
               <p>Your Registration status is currently 
               <b><span style='color:orange;'> &nbsp; PENDING</span></b></p>

               <p><b>I hope this email finds you well.</b>
               We would like to inform you that we have received your registration request on our system.</p>  
               
               <p>However, it seems that your registration is currently<b> PENDING</b>. We assure you that our team is diligently reviewing your request to ensure a seamless onboarding process.</p>

                <p>Please bear with us as we finalize the verification process. Rest assured, we will notify you promptly once your account is approved and ready for use.</p>

                <p>In the meantime, if you have any questions or need further assistance, feel free to reach out. We're here to help!</p>

                <b><p>Thank you for your patience and understanding. </p> </b>
                <b><p>For more inquiries feel free to reach us!</p></b>
               </td>
           </tr>
           <div class='footer '>
           <p>&copy; 2024 BARANGAY 20, ZONE 2, DISTRICT II ALL RIGHTS RESERVED..</p>
           <p><a href=' https://www.facebook.com/groups/uccalumnioraganization/'>BARANGAY 20 FB PAGE</a> .</p>
   </div>
           </table>

        </body>
    </html>";

    if (!$mail->send()) {
        $response['icon'] = "error";
        $response['message'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }

} else {
    $response['icon'] = "error";
    $response['message'] = "Error has occurred while registering";
}


echo json_encode($response);

?>