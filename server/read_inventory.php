<?php 
include '../config/connection.php';
session_start();
$response = array(
    'icon'=>'',
    'message'=>'',
    'member_id'=>''
);  

$id = sanitizeData(getDatabase(), $_POST['id']);

$sql = "SELECT * FROM `barangay_inventory` WHERE `id` = '$id' ";
$result = mysqli_query(getDatabase(), $sql);
$row = mysqli_fetch_array($result);

echo json_encode($row);
?>