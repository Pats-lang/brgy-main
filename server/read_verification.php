<?php 
include '../config/connection.php';
session_start();
$response = array(
   
);  

$id = sanitizeData(getDatabase(), $_POST['id']);

$sql = "SELECT * FROM `user_account` WHERE `account_id` = '$id' ";
$result = mysqli_query(getDatabase(), $sql);
$row = mysqli_fetch_array($result);

echo json_encode($row);
?>