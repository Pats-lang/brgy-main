<?php

include './config/connection.php';

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
$uploadDirectory = "./assets/images/proof-profiles";
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
    
    $register_accountId = sanitizeData(getDatabase(), $_POST['account_id']);
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

    if ($prepared_membersSql = $db->prepare("INSERT INTO `user_account` (`account_id`,`precinct_number`, `first_name`, `middle_name`, `last_name`, `gender`, `birthday`, `marital_status`, `contact`, `religion`, `sector`, `address`, `email`, `proof_of_identity`, `profile`,`username`,`password`,`status`) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)")) {
        $prepared_membersSql->bind_param(
            "isssssssisssssssss", // Updated to match the correct number of data types
            $register_accountId
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
            $register_password,
            $status
        );

        if (!$prepared_membersSql->execute()) {
            $response['status'] = true;
            $response['message'] = "successfully registered";
        }
        $prepared_membersSql->close();
    } else {
        $response['status'] = false;
        $response['message'] = "An error occurred while preparing the Personal Information SQL statement: " . $db->error;
    }
}

echo json_encode($response);
