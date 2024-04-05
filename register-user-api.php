<?php

include 'config/connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$response = array(
    'status' => true,
    'icon' => '',
    'message' => '',
    'count' => 0,
    'admin' => '',
    'operation' => '',
    'description' => ''
);

// personal_information
$uploadDirectory = "./assets/images/proof-pictures/";
$profileName = $_FILES['profile']['name'];
$profileTmpName = $_FILES['profile']['tmp_name'];
$proof_of_residencyName = $_FILES['proof_of_residency']['name'];
$proof_of_residencyTmpName = $_FILES['proof_of_residency']['tmp_name'];
$allowedExtensions = ['jpg', 'jpeg', 'png'];
$profileExtension = strtolower(pathinfo($profileName, PATHINFO_EXTENSION));
$proof_of_residencyExtension = strtolower(pathinfo($proof_of_residencyName, PATHINFO_EXTENSION));

if (!in_array($profileExtension, $allowedExtensions) || !in_array($proof_of_residencyExtension, $allowedExtensions)) {
    $response['status'] = false;
    $response['icon'] = "error";
    $response['message'] = "Only JPEG & PNG images are allowed.";
} else {
    $uploadedprofilePath = $uploadDirectory . $profileName;
    $uploadedproof_of_residencyPath = $uploadDirectory . $proof_of_residencyName;
    move_uploaded_file($profileTmpName, $uploadedprofilePath);
    move_uploaded_file($proof_of_residencyTmpName, $uploadedproof_of_residencyPath);
    

    $register_firstName = sanitizeData(getDatabase(), $_POST['first_name']);
    $register_middleName = sanitizeData(getDatabase(), $_POST['middle_name']);
    $register_lastName = sanitizeData(getDatabase(), $_POST['last_name']);
    $register_gender = sanitizeData(getDatabase(), $_POST['gender']);
    $register_contactNumber = sanitizeData(getDatabase(), $_POST['contact_number']);
    $register_precinctNumber = sanitizeData(getDatabase(), $_POST['precinct_number']);
    $register_birthDate = sanitizeData(getDatabase(), $_POST['birthday']);
    $register_maritalStatus = sanitizeData(getDatabase(), $_POST['marital_status']);
    $register_address  = sanitizeData(getDatabase(), $_POST['address']);
    $register_email = sanitizeData(getDatabase(), $_POST['email']);
    $register_religion = sanitizeData(getDatabase(), $_POST['religion']);
    $register_sector = sanitizeData(getDatabase(), $_POST['sector']);
    $register_username = sanitizeData(getDatabase(), $_POST['username']);
    $register_password = sanitizeData(getDatabase(), $_POST['password']);
    $status = 0;
    $hashed_password = password_hash($register_password, PASSWORD_DEFAULT);
    if ($prepared_membersSql = $db->prepare("INSERT INTO `user_account` (`precinct_number`, `first_name`, `middle_name`, `last_name`, `gender`, `birthday`, `marital_status`, `contact`, `religion`, `sector`, `address`, `email`, `proof_of_identity`, `profile`,`username`,`password`,`status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)")) {

        $prepared_membersSql->bind_param(
            "sssssssisssssssss", // Updated to match the correct number of data types

           
            $register_precinctNumber,
            $register_firstName,
            $register_middleName,
            $register_lastName,
            $register_gender,
            $register_birthDate,
            $register_maritalStatus,
            $register_contactNumber,
            $register_religion,
            $register_sector,
            $register_address,
            $register_email,
            $proof_of_residencyName,
            $profileName,
            $register_username,
            $hashed_password, 
            $status
        );

        if (!$prepared_membersSql->execute()) {
          

            require 'plugins/PHPMailer/src/Exception.php';
            require 'plugins/PHPMailer/src/PHPMailer.php';
            require 'plugins/PHPMailer/src/SMTP.php';
        
              
            $mail = new PHPMailer(true);
        
            try {
        
        
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'barangay020@gmail.com';
                $mail->Password = 'bbcwbtiyfcxduefe';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                
                $mail->setFrom('barangay020@gmail.com');
              
                $mail->addAddress($register_email); // Replace with your actual email address
               
                $imageUrl = 'https://i.ibb.co/NC26SjV/barangay.gif';
    
            
                    $approvalMessage = " <b>Your Account Verification status is currently <span style='color:yellow;'> &nbsp; Pending</span></b></p  
    
                                    <p>I trust this message finds you well.
                                    <b>We are pleased to inform you that your registration is pending.</b></p>
                                  
                                   <p> If you have any questions or need assistance, feel free to reach out.
                                    </p>
                                  
                                    ";
                    
                    $mailSubject = 'Account Verification Request - Pending Status';
           
               
                
    
                $mail->Subject =  $mailSubject;
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
                        <h2>Greetings "' . $register_firstName . '"!</h2>
                        <p>"' .$approvalMessage  . '"!</p>
                       
                        <b><p>For more inquiries feel free to reach us!</p></b>
                    </td>
                        </tr>
                    </table>
                </body>
                </html>';
        
        
                $mail->isHTML(true);
                $mail->send();
        
                http_response_code(200); // OK
                $response['status'] = true;
                $response['message'] = 'Successfully .'; 
            
                
            } catch (Exception $e) {
                http_response_code(500); // Internal Server Error
                $response['status'] = false;
                $response['message'] = "Failed to update announcement information: " . $preparedSql->error;
            }
           
        }
        $prepared_membersSql->close();
    } else {
        $response['status'] = false;
        $response['message'] = "An error occurred while preparing the Personal Information SQL statement: " . $db->error;
    }
}

echo json_encode($response);