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
$signatureName = $_FILES['register_signature']['name'];
$signatureTmpName = $_FILES['register_signature']['tmp_name'];



$allowedExtensions = ['jpg', 'jpeg', 'png'];
$pictureExtension = strtolower(pathinfo($pictureName, PATHINFO_EXTENSION));
$signatureExtension = strtolower(pathinfo($signatureName, PATHINFO_EXTENSION));

if (!in_array($pictureExtension, $allowedExtensions) || !in_array($signatureExtension, $allowedExtensions)) {
    $response['false'] = false;
    $response['icon'] = "error";
    $response['message'] = "Only JPEG & PNG images is allowed.";
}
$uploadedPicturePath = $uploadDirectory . $pictureName;
$uploadedSignaturePath = $uploadDirectory . $signatureName;

move_uploaded_file($pictureTmpName, $uploadedPicturePath);
move_uploaded_file($signatureTmpName, $uploadedSignaturePath);


$register_memberId = sanitizeData(getDatabase(), $_POST['register_memberId']);
$register_precinctNo = sanitizeData(getDatabase(), $_POST['register_precinctNo']);
$register_name = sanitizeData(getDatabase(), $_POST['register_name']);
$register_birthDate = sanitizeData(getDatabase(), $_POST['register_birthDate']);
$register_emailAddress = sanitizeData(getDatabase(), $_POST['register_emailAddress']);
$register_cellNo = sanitizeData(getDatabase(), $_POST['register_cellNo']);
$register_religion = sanitizeData(getDatabase(), $_POST['register_religion']);
$register_status = sanitizeData(getDatabase(), $_POST['register_status']);
$register_yearToday = sanitizeData(getDatabase(), $_POST['register_yearToday']);
$register_memberCount = sanitizeData(getDatabase(), $_POST['register_memberCount']);
$register_campusId = sanitizeData(getDatabase(), $_POST['register_campusId']);

$cid = 1;
$status= 0;

if ($prepared_membersSql = $db->prepare("INSERT INTO `members` (`member_id`, `year`, `member_count`, `campus_id`, `name`, `precinct`, `birth_date`, `civil_status`, `religion`, `email_address`, `cellphone_no`, `picture`, `signature`, `cid`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
    $prepared_membersSql->bind_param(
        "isissssssssssii",
        $register_memberId,
        $register_yearToday,
        $register_memberCount,
        $register_campusId,
        $register_name,
        $register_precinctNo,
        $register_birthDate,
        $register_status,
        $register_religion,
        $register_emailAddress,
        $register_cellNo,
        $pictureName,
        $signatureName,
        $cid,
        $status
        
        
    );
    if (!$prepared_membersSql->execute()) {
        $response['false'] = false;
       $response['message'] ="Error executing Personal Information SQL statement: " . $prepared_membersSql->error;
    }
    $prepared_membersSql->close();
} else {
   $response['message'] ="An error occurred while preparing the Personal Information SQL statement: " . $prepared_membersSql->error;
}

// address
$register_addResidency = (array)$_POST['register_addResidency'];
$register_addYears = (array)$_POST['register_addYears'];
$register_address = (array)$_POST['register_address'];
$register_addPostal = (array)$_POST['register_addPostal'];
$register_addDistrict = (array)$_POST['register_addDistrict'];
$register_addBarangay = (array)$_POST['register_addBarangay'];
$register_addRegion = (array)$_POST['register_addRegion'];
$register_addProvince = (array)$_POST['register_addProvince'];
$register_addCity = (array)$_POST['register_addCity'];
for ($i = 0; $i < count($register_addResidency); $i++) { //Using any open failed to count the maximum count of rows.
    $residency = sanitizeData(getDatabase(), $register_addResidency[$i]);
    $yrs_res = sanitizeData(getDatabase(), $register_addYears[$i]);
    $address = sanitizeData(getDatabase(), $register_address[$i]);
    $postal = sanitizeData(getDatabase(), $register_addPostal[$i]);
    $district = sanitizeData(getDatabase(), $register_addDistrict[$i]);
    $brgy = sanitizeData(getDatabase(), $register_addBarangay[$i]);
    $region = sanitizeData(getDatabase(), $register_addRegion[$i]);
    $province = sanitizeData(getDatabase(), $register_addProvince[$i]);
    $city = sanitizeData(getDatabase(), $register_addCity[$i]);

    if ($prepared_membersWorkSql = $db->prepare("INSERT INTO `member_address` (`member_id`, `residency`, `yrs_res`, `address`, `postal`, `district`, `brgy`, `region`, `province`, `city`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
        $prepared_membersWorkSql->bind_param("isssssssss", $register_memberId, $residency, $yrs_res, $address, $postal, $district, $brgy, $region, $province, $city);
        if (!$prepared_membersWorkSql->execute()) {
            $response['false'] = false;
           $response['message'] ="Error executing Work Experience SQL statement:" . $prepared_membersWorkSql->error;
        }
        $prepared_membersWorkSql->close();
    } else {
       $response['message'] ="An error occurred while preparing the Work Experience SQL statement:" . $prepared_membersWorkSql->error;
    }
}

// Emergency
$register_emergencyName = $_POST['register_emergencyName'];
$register_emergencyRelation = $_POST['register_emergencyRelation'];
$register_emergencyContact = $_POST['register_emergencyContact'];
$register_emergencyAddress = $_POST['register_emergencyAddress'];
for ($i = 0; $i < count($register_emergencyName); $i++) {
    $contact_name = sanitizeData(getDatabase(), $register_emergencyName[$i]);
    $contact_relation = sanitizeData(getDatabase(), $register_emergencyRelation[$i]);
    $contact_no = sanitizeData(getDatabase(), $register_emergencyContact[$i]);
    $contact_address = sanitizeData(getDatabase(), $register_emergencyAddress[$i]);


    if ($prepared_trainingsSql = $db->prepare("INSERT INTO `member_emergency` (`member_id`, `contact_name`, `contact_relation`, `contact_no`, `contact_address`) VALUES (?, ?, ?, ?, ?)")) {
        $prepared_trainingsSql->bind_param("issss", $register_memberId, $contact_name, $contact_relation, $contact_no, $contact_address);
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

$proofIdName =(array) $_FILES['register_proofId']['name'];
$proofIdTmpName =(array) $_FILES['register_proofId']['tmp_name'];
$proofResidencyName =(array) $_FILES['register_proofResidency']['name'];
$proofResidencyTmpName = (array)$_FILES['register_proofResidency']['tmp_name'];

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
        $prepared_proofSql->bind_param("iss", $register_memberId, $valid_id, $proof_residency);
        if (!$prepared_proofSql->execute()) {
            $response['false'] = false;
           $response['message'] ="Error executing Affililiations SQL statement:" . $prepared_proofSql->error;
        }
        $prepared_proofSql->close();
    } else {
       $response['message'] ="An error occurred while preparing the Affililiations SQL statement:" . $prepared_proofSql->error;
    }


// achievements
$register_accountUser = $_POST['register_accountUser'];
$register_accountPassword = $_POST['register_accountPassword'];
for ($i = 0; $i < count($register_accountUser); $i++) {
    $username = sanitizeData(getDatabase(), $register_accountUser[$i]);
    $password = sanitizeData(getDatabase(), $register_accountPassword[$i]);

    if ($prepared_achievementsSql = $db->prepare("INSERT INTO `member_account` (`member_id`, `username`, `password`) VALUES (?, ?, ?)")) {
        $prepared_achievementsSql->bind_param("iss", $register_memberId, $username, $password);
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
    $response['message'] = "Congratulations! You are now a Registered BARANGAY 20!
    Please check your email to monitor/track the status of your request.
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
               <h2>Greetings {$register_name}!</h2>
               <p>Your reservation status is currently 
               <b><span style='color:orange;'> &nbsp; PENDING</span></b></p>

               <p><b>I hope this email finds you well.</b>
               We have received your <b> request</b>, and we 
               appreciate your prompt action in processing the payment.</p>  
               
               <p>To expedite the approval process, kindly make the payment of
                One hundred Pesos (100) to the following <b>GCash number: 09196994697</b>.</p>

                <p>Once the payment is made, <b>please send a screenshot of the transaction </b>
                confirmation to this Email. This will help us verify your 
                payment quickly and approve your  request.</p>

                <p>We understand the importance of having your request, and we aim to process your request promptly. 
                Thank you for your cooperation in this matter.</p>

                <b><p>We hope that this response answered your inquiry, we also hope that this helped you. </p> </b>
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