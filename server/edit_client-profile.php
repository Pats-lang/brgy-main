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
function getExistingImageName($profileid) {
    global $db; // Assuming $db is your database connection object

    $query = "SELECT picture FROM members WHERE member_id  = ?";
    if ($stmt = $db->prepare($query)) {
        $stmt->bind_param("i", $profileid);
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
    $edit_IdAnnouncements = sanitizeData(getDatabase(), $_POST['editmember_id']);
    $existingImageName = getExistingImageName($edit_IdAnnouncements);

    if ($existingImageName) {
        // Use the existing image name
        $changeprofilepic = $existingImageName;
    } else {
        // Handle the case where no existing image name is found (perhaps set to a default or handle as needed)
        $changeprofilepic = null;
    }
}

$precinct = sanitizeData(getDatabase(), $_POST['precinct']);
$firstname = sanitizeData(getDatabase(), $_POST['firstname']);
$middlename = sanitizeData(getDatabase(), $_POST['middlename']);
$lastname = sanitizeData(getDatabase(), $_POST['lastname']);
$surfix = sanitizeData(getDatabase(), $_POST['surfix']);
$birth_date = sanitizeData(getDatabase(), $_POST['birth_date']);
$civil_status = sanitizeData(getDatabase(), $_POST['civil_status']);
$campus_id = sanitizeData(getDatabase(), $_POST['campus_id']);
$inputAddress = sanitizeData(getDatabase(), $_POST['inputAddress']);
$religion = sanitizeData(getDatabase(), $_POST['religion']);
$cellphone_no = sanitizeData(getDatabase(), $_POST['cellphone_no']);
$member_id = sanitizeData(getDatabase(), $_POST['editmember_id']);

if ($preparedSql = $db->prepare("UPDATE `members` SET `precinct`= ?, 
`picture`= ?,
`firstname`= ?,
`middlename`= ?,
`lastname`= ?,
`surfix`= ?,
`birth_date`= ?,
`civil_status`= ?,
`campus_id`= ?,
`address`= ?,
`religion`= ?,
`cellphone_no`= ? WHERE `member_id `= ?,")) {
    $preparedSql->bind_param("ssssssssssssi", $precinct, $changeprofilepic, 
    $firstname, $middlename, $lastname, $surfix, $birth_date, $civil_status,
     $campus_id, $inputAddress, $religion, $cellphone_no, $member_id);

    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully updated announcement details.';
        $response['admin'] = $_SESSION['adminLogged'];
        $response['operation'] = "edit";
        $response['description'] = "Announcement: <b>" . strtoupper($edit_titleAnnouncements) . "</b> has been updated at <b>Announcements.</b>";
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
