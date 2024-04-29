<?php
include '../config/connection.php';
session_start();

$response = array(
    'status' => false,
    'message' => '',
    'admin' => '',
    'operation' => '',
    'description' => ''
);

// Define your function to retrieve existing image name based on announcement ID
function getExistingImageName($member_id) {
    global $db; // Assuming $db is your database connection object

    $query = "SELECT picture FROM members WHERE member_id = ?";
    
    if ($stmt = $db->prepare($query)) {
        $stmt->bind_param("i", $member_id);
        $stmt->execute();
        $stmt->bind_result($existingImageName);

        if ($stmt->fetch()) {
            $stmt->close();
            return $existingImageName;
        }
    }

    return null;
}

$uploadDirectory = "../assets/images/member_pictures/";
$changeprofilepic = isset($_FILES['changeprofilepic']) ? $_FILES['changeprofilepic']['name'] : null;
$changeprofilepicTmpName = isset($_FILES['changeprofilepic']) ? $_FILES['changeprofilepic']['tmp_name'] : null;

// Check if an image is uploaded
if (!empty($changeprofilepic)) {
    // If an image is uploaded, move it to the upload directory
    move_uploaded_file($changeprofilepicTmpName, $uploadDirectory . $changeprofilepic);
} else {
    // If no image is uploaded, keep the existing image name in the database
    $editmember_id = sanitizeData(getDatabase(), $_POST['editmember_id']);
    $existingImageName = getExistingImageName($editmember_id);

    if ($existingImageName) {
        // Use the existing image name
        $changeprofilepic = $existingImageName;
    } else {
        // Handle the case where no existing image name is found (perhaps set to a default or handle as needed)
        $changeprofilepic = null;
    }
}

$precinct = $_POST['precinct'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$surfix = $_POST['surfix'];
$birth_date = $_POST['birth_date'];
$civil_status = $_POST['civil_status'];
$campus_id = $_POST['campus_id'];
$inputAddress = $_POST['inputAddress'];
$religion = $_POST['religion'];
$cellphone_no = $_POST['cellphone_no'];
$residency = $_POST['residency'];
$yrs_res = $_POST['yrs_res'];
$cellphone_no = $_POST['cellphone_no'];
$editmember_id = $_POST['editmember_id'];
$contact_name = $_POST['contact_name']; 
$fullname = $lastname . ', ' . $firstname . ' ' . $middlename; // Add this line to retrieve contact name

// Update query with inner join
$sql = "UPDATE members
        INNER JOIN member_account ON members.member_id = member_account.member_id
        INNER JOIN member_address ON members.member_id = member_address.member_id
        INNER JOIN member_emergency ON members.member_id = member_emergency.member_id
        SET members.precinct = ?,
            members.picture = ?,
            members.fullname = ?,
            members.firstname = ?,
            members.middlename = ?,
            members.lastname = ?,
            members.surfix = ?,
            members.birth_date = ?,
            members.civil_status = ?,
            members.campus_id = ?,
            members.address = ?,
            members.religion = ?,
            members.cellphone_no = ?,
            member_address.residency = ?,
            member_address.yrs_res = ?,
            member_emergency.contact_no = ?,
            member_emergency.contact_name = ?  -- Add this line for contact_name
        WHERE members.member_id = ?";

$stmt = $db->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssssssssssssssssi", $precinct, $changeprofilepic, $fullname, $firstname, $middlename, $lastname, $surfix, $birth_date, $civil_status, $campus_id, $inputAddress, $religion, $cellphone_no, $residency, $yrs_res, $cellphone_no, $contact_name, $editmember_id); // Modify bind_param to include contact_name
    
    if ($stmt->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully updated member details.';
        $response['admin'] = $_SESSION['adminLogged'];
        $response['operation'] = "edit";
        $response['description'] = "Member with ID: " . $editmember_id . " has been updated.";
    } else {
        $response['status'] = false;
        $response['message'] = "Failed to prepare update statement: " . $db->error;
        http_response_code(500); // Internal Server Error
    }

    $stmt->close();
} else {
    $response['status'] = false;
    $response['message'] = "Failed to prepare update statement: " . $db->error;
    http_response_code(500); // Internal Server Error
}

echo json_encode($response);
?>
