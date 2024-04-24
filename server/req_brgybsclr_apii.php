<?php
include '../config/connection.php';
session_start();

// Prepare response array
$response = array(
);
// Sanitize and retrieve POST data
$req_transaction_id = sanitizeData(getDatabase(), $_POST['transaction_id']);
$req_member_id = sanitizeData(getDatabase(), $_POST['member_id']);
$business_name = sanitizeData(getDatabase(), $_POST['business_name']);
$owner_name = sanitizeData(getDatabase(), $_POST['name']);
$kof = sanitizeData(getDatabase(), $_POST['kof']);
$yrs_res = sanitizeData(getDatabase(), $_POST['residency']);
$req_contact_number = sanitizeData(getDatabase(), $_POST['contact']);
$req_purpose = sanitizeData(getDatabase(), $_POST['purpose']);
$req_email = sanitizeData(getDatabase(), $_POST['email']);
$address = sanitizeData(getDatabase(), $_POST['address']);
$req_request = sanitizeData(getDatabase(), $_POST['request']);
$status = 0;

if ($preparedSql = $db->prepare("INSERT INTO `request_busclearance` (`member_id`, `transaction_id`, `business_name`, `owner_name`, `kof_business` 
, `yrs_res`, `contact_no`, `purpose`, `email`, `address`, `request`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)")) {
    $preparedSql->bind_param("issssisssssi", 
    $req_member_id, $req_transaction_id, $business_name, $owner_name, $kof, $yrs_res, $req_contact_number, $req_purpose, $req_email, $address, $req_request, $status);

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
