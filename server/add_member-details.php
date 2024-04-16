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
    $response['message'] = "New Barangay 20 Resisdent was successfully registered";
    
    $response['admin'] =  $_SESSION['adminLogged'];
    $response['operation'] = "add";
    $response['description'] = "Alumni Member: <b>" . $_POST['register_memberId'] . "</b> have been registered at  <b>Alumni Members.</b>";
} else {
    $response['icon'] = "error";
    $response['message'] = "Error has occurred while registering";
}

echo json_encode($response);
?>
