<?php
include '../config/connection.php';
session_start();

// Prepare response array
$response = array(
);
// Sanitize and retrieve POST data
$req_transaction_id = sanitizeData(getDatabase(), $_POST['transaction_id']);
$req_member_id = sanitizeData(getDatabase(), $_POST['member_id']);
$req_name = sanitizeData(getDatabase(), $_POST['name']);
$req_request = sanitizeData(getDatabase(), $_POST['request']);
$year_of_residency = sanitizeData(getDatabase(), $_POST['residency']);
$req_address = sanitizeData(getDatabase(), $_POST['address']);
$req_email = sanitizeData(getDatabase(), $_POST['email']);
$req_contact_number = sanitizeData(getDatabase(), $_POST['contact']);
$req_purpose = sanitizeData(getDatabase(), $_POST['purpose']);
$status = 0;

if ($preparedSql = $db->prepare("INSERT INTO `request_brgycert` (`transaction_id`, `member_id`, `name`, `request`, `yrs_res`, `address`, `email`, `contact_no`, `purpose`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?)")) {
    $preparedSql->bind_param("sississsss", $req_transaction_id , $req_member_id, $req_name, $req_request, $year_of_residency, $req_address, $req_email, $req_contact_number, $req_purpose, $status);

  if ($preparedSql->execute()) {
    $response['status'] = true;
    $response['message'] = 'Request Send Successfully.';
  } else {
    $response['status'] = false;
    $response['message'] = 'Failed to add a new annoucement: ' . $preparedSql->error;
    http_response_code(500); // Internal Server 
  }
  $preparedSql->close();
} else {
  $response['status'] = false;
  $response['message'] = 'An error occurred while preparing the INSERT statement: ' . $db->error;
  http_response_code(500); // Internal Server Error
}

echo json_encode($response);
?>
