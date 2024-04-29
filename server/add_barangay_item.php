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

$uploadDirectory = "../assets/images/item/";
$add_ImageItem = $_FILES['add_ImageItem']['name'];
$add_ImageItemTmpName = $_FILES['add_ImageItem']['tmp_name'];
$uploadedItempicturePath = $uploadDirectory . $add_ImageItem;
move_uploaded_file($add_ImageItemTmpName, $uploadedItempicturePath);
$add_ItemName = sanitizeData(getDatabase(), $_POST['add_ItemName']);
$add_stocks = sanitizeData(getDatabase(), $_POST['add_stocks']);

  if ($preparedSql = $db->prepare("INSERT INTO `barangay_inventory` (`item_name`, `picture`, `stocks`) VALUES (?,?,?)")) {
    $preparedSql->bind_param("ssi", $add_ItemName, $add_ImageItem, $add_stocks);

  if ($preparedSql->execute()) {
    $response['status'] = true;
    $response['message'] = 'barangay_inventory had been successfully added.';
    $response['admin'] =  $_SESSION['adminLogged'];
    $response['operation'] = "add";
    $response['description'] = "barangay_inventory  <b>" . strtoupper($add_ItemName). "</b> have been added at <b>barangay_inventory .</b>";
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