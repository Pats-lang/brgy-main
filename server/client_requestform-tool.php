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
$item_name = sanitizeData(getDatabase(), $_POST['item']);
$fullname = sanitizeData(getDatabase(), $_POST['fullname']);
$address = sanitizeData(getDatabase(), $_POST['address']);
$borrowed_sched = sanitizeData(getDatabase(), $_POST['borrowed_sched']);
$return_sched = sanitizeData(getDatabase(), $_POST['return_sched']);
$contact = sanitizeData(getDatabase(), $_POST['contact']);
$purpose = sanitizeData(getDatabase(), $_POST['purpose']);
$member_id = sanitizeData(getDatabase(), $_POST['member_id']);
$status = 0;



  if ($preparedSql = $db->prepare("INSERT INTO `request_tools` (`member_id`, `Item`, `fullname`, `address`, `borrowed_sched`, `return_sched`, `contact`, `purpose`, `status`) VALUES (?,?,?,?,?,?,?,?,?)")) {
    $preparedSql->bind_param("isssssiss",$member_id, $item_name, $fullname, $address, $borrowed_sched, $return_sched, $contact, $purpose, $status);

  if ($preparedSql->execute()) {
    $response['status'] = true;
    $response['message'] = 'request_tools had been successfully added.';
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