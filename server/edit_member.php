<?php
include '../config/connection.php';

session_start();

$response = array(
    'status' => false,
    'message' => '',
    'admin' => '',
    'operation' => '',
    'description' => '',
    'picture'=>'',
    'stats' => ''
    
);

// Define your function to retrieve the existing image names based on the member ID
function getExistingImageNames($memberid) {
    global $db; // Assuming $db is your database connection object

    $query = "SELECT picture FROM members WHERE member_id = ?";
    
    if ($stmt = $db->prepare($query)) {
        $stmt->bind_param("i",$memberid);
        $stmt->execute();
        $stmt->bind_result($existingPictureName);
            
        if ($stmt->fetch()) {
            $stmt->close();
            return array('picture' => $existingPictureName);
        }
    }

    return null;
}

$uploadDirectory = "../assets/images/member_pictures/";

// Picture handling
$_picture = isset($_FILES['Editmember_picture_input']) ? $_FILES['Editmember_picture_input']['name'] : null;
$_pictureTmpName = isset($_FILES['Editmember_picture_input']) ? $_FILES['Editmember_picture_input']['tmp_name'] : null;



// Check if a picture is uploaded
if (empty($_picture)) {
    // If no picture is uploaded, keep the existing picture name in the database
    $_id = sanitizeData(getDatabase(), $_POST['Editmember_id']);
    $existingImageNames = getExistingImageNames($_id);

    if ($existingImageNames) {
        // Use the existing picture name
        $_picture = $existingImageNames['picture'];
    } else {
        // Handle the case where no existing picture name is found (perhaps set to a default or handle as needed)
        $_picture = null;
    }
} else {
    // If a picture is uploaded, move it to the upload directory
    move_uploaded_file($_pictureTmpName, $uploadDirectory . DIRECTORY_SEPARATOR . $_picture);
}




$_fullname = $_POST['Editmember_fullname'];
$_precinct = $_POST['Editmember_precinct'];
$_address = $_POST['Editmember_address'];
$_emailaddress = $_POST['Editmember_emailAddress'];
$_birthDate = $_POST['Editmember_birthDate'];
$_cellNo = $_POST['Editmember_cellNo'];
$_religion = $_POST['Editmember_religion'];
$_civilStatus = $_POST['Editmember_civilStatus'];
$_id = $_POST['Editmember_id'];
$status = $_POST['stats'];

if ($preparedSql = $db->prepare("UPDATE `members` SET `fullname`= ?, `address`= ?, `birth_date`= ?, `civil_status`= ?, `religion`= ?, `precinct`= ?, `email_address`= ?, `cellphone_no`= ?, `picture`= ?, `status`= ? WHERE `member_id`= ?")) {
    $preparedSql->bind_param("ssssssssssi", $_fullname, $_address, $_birthDate, $_civilStatus, $_religion, $_precinct, $_emailaddress, $_cellNo, $_picture, $status, $_id);

    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully updated member information';
        $response['stats'] = $status;
        $response['admin'] = $_SESSION['adminLogged'];
        if($status == 1){
            $response['operation'] = "accepted";
            $response['description'] = " Resident: <b>" . strtoupper($_fullname) . "</b> has been Accepted at <b> Resident at List.</b>";
        }else if($status == 3){
            $response['operation'] = "remove";
            $response['description'] = " Resident: <b>" . strtoupper($_fullname) . "</b> has been Removed at <b> Resident List .</b>";
        }else if($status == 2){
            $response['operation'] = "retrived";
            $response['description'] = " Resident: <b>" . strtoupper($_fullname) . "</b> has been Rejected at <b> Resident List .</b>";
        }
    }else{
        $response['status'] = false;
        $response['message'] = "Failed to update member information: " . $preparedSql->error;
        http_response_code(500); // Internal Server Error
    }
    $preparedSql->close();
} else {
    $response['status'] = false;
    $response['message'] = "An error occurred while preparing the UPDATE statement: " . $db->error;
    http_response_code(500); // Internal Server Error
}

echo json_encode($response);
?>
