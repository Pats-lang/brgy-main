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

$fullname = sanitizeData(getDatabase(), $_POST['fullname']);
$address = sanitizeData(getDatabase(), $_POST['address']);
$borrowed_sched = sanitizeData(getDatabase(), $_POST['borrowed_sched']);
$return_sched = sanitizeData(getDatabase(), $_POST['return_sched']);
$contact = sanitizeData(getDatabase(), $_POST['contact']);
$purpose = sanitizeData(getDatabase(), $_POST['purpose']);


  if ($preparedSql = $db->prepare("INSERT INTO `barangay_inventory` (`item_name`, `picture`, `stocks`) VALUES (?,?,?)")) {
    $preparedSql->bind_param("ssi", $add_ItemName, $add_ImageItem, $add_stocks);

  if ($preparedSql->execute()) {
    $response['status'] = true;
    $response['message'] = 'barangay_inventory had been successfully added.';
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