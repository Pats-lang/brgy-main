<?php
include '../config/connection.php';
session_start();

$response = array(
    'status' => false,
    'message' => '',
    'admin_id' => '',
    'resident_name' => '',
    'cellphone_no' => array()
);

// Check if member_id is set and not empty
if (!isset($_POST['member_id']) || empty($_POST['member_id'])) {
    $response['message'] = "Error: No member IDs received.";
    echo json_encode($response);
    exit(); // Stop further execution
}

// Fetch citizen information
$memberIds = json_decode($_POST['member_id'], true); // Decode JSON string into an array
if (!empty($memberIds)) {
    $mobileNumbers = array();
    $fnames = array();
    foreach ($memberIds as $memberId) {
        $query = "SELECT * FROM members WHERE member_id = '$memberId'";
        $result = mysqli_query(getDatabase(), $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $memberData = mysqli_fetch_assoc($result);
            $mobileNumbers[] = $memberData['cellphone_no'];
            $fnames[] = $memberData['firstname'];
        } else {
            $response['message'] = "Error fetching citizen information for member ID: $memberId";
            echo json_encode($response);
            exit(); // Stop further execution
        }
    }
    $currentDate = date("m-d");
    $response['cellphone_no'] = $mobileNumbers;
    $response['resident_name'] = $fnames;
    $response['admin'] = $_SESSION['adminLogged'];
    $response['operation'] = 'add';
    $response['description'] = 'Send Message on Residents';
    $response['status'] = true;
    $response['message'] = "Member information fetched successfully.";
} else {
    $response['message'] = "Error: No member IDs received.";
}

echo json_encode($response);
?>
