<?php

include 'config/connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Ensure error reporting is enabled
error_reporting(E_ALL);
ini_set('display_errors', 1);

$response = array(
    'status' => true,

);

// Check if files are uploaded
if (isset($_FILES['profile']) && isset($_FILES['proof_of_residency'])) {
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

        // Database insertion logic
        if ($response['status']) {
            // Your database insertion code here

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

            if ($prepared_membersSql = $db->prepare("INSERT INTO `user_account` (`precinct_number`, `first_name`, `middle_name`, `last_name`, `gender`, `birthday`, `marital_status`, `contact`, `religion`, `sector`, `address`, `email`, `proof_of_identity`, `profile`,`username`,`password`,`status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {

                $prepared_membersSql->bind_param(
                    "sssssssisssssssss",
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
                    $response['status'] = false;
                    $response['message'] = "Failed to execute SQL statement: " . $prepared_membersSql->error;
                }

                $prepared_membersSql->close();
            } else {
                $response['status'] = false;
                $response['message'] = "An error occurred while preparing the Personal Information SQL statement: " . $db->error;
            }
        }
    }
} else {
    $response['status'] = false;
    $response['message'] = 'Profile picture or proof of residency is missing.';
}

// Sending email
if (!$response['status']) {
    try {
        require_once 'plugins/PHPMailer/src/Exception.php';
        require_once 'plugins/PHPMailer/src/PHPMailer.php';
        require_once 'plugins/PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'barangay020@gmail.com';
        $mail->Password = 'bbcwbtiyfcxduefe';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 465;
        
        $mail->setFrom('barangay020@gmail.com');

        $mail->addAddress($register_email);

        $mailSubject = 'Account Verification Request - Pending Status';
        $mailBody = "<html>
            <head>
                <style>
                    body {
                        font-family: 'Arial', sans-serif;
                        background-color: #f4f4f4;
                        color: #333;
                        margin: 0;
                    }
                    /* Your CSS styles here */
                </style>
            </head>
            <body>
                <h2>Greetings $register_firstName!</h2>
                <p>Your Account Verification status is currently <span style='color:yellow;'> Pending</span></p>
                <p>We are pleased to inform you that your registration is pending.</p>
                <p>If you have any questions or need assistance, feel free to reach out.</p>
                <p>For more inquiries feel free to reach us!</p>
            </body>
        </html>";

        $mail->isHTML(true);
        $mail->Subject = $mailSubject;
        $mail->Body = $mailBody;

        $mail->send();

        $response['message'] = 'Successfully registered. Email sent for verification.';
    } catch (Exception $e) {
        $response['message'] = "Failed to send email: " . $e->getMessage();
    }
}

echo json_encode($response);
?>
