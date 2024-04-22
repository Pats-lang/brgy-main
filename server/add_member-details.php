<?php
include '../config/connection.php';
session_start();
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
    $response['message'] = "New Barangay 20 Resisdent was successfully registered";
    
    $response['admin'] =  $_SESSION['adminLogged'];
    $response['operation'] = "add";
    $response['description'] = "Resident Member: <b>" . $_POST['register_memberId'] . "</b> have been registered at  <b>Resident Members.</b>";
} else {
    $response['icon'] = "error";
    $response['message'] = "Error has occurred while registering";
}

echo json_encode($response);
?>
