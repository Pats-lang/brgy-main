<?php 
include '../config/connection.php';
session_start();
$response = array(
   
);  

$id = sanitizeData(getDatabase(), $_POST['transaction_id']);

$sql = "SELECT * FROM `request_brgycoi` WHERE `id` = '$id' ";
$result = mysqli_query(getDatabase(), $sql);
$row = mysqli_fetch_array($result);

echo json_encode($row);
?>