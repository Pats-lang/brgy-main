<?php 
include '../config/connection.php';
session_start();
$response = array(
    'icon'=>'',
    'message'=>'',
    'member_id'=>''
);  

$id = sanitizeData(getDatabase(), $_POST['member_id']);

$sql = "
SELECT members.*, member_proof.*
FROM members
INNER JOIN member_proof ON members.member_id = member_proof.member_id
WHERE members.member_id = '$id'";$result = mysqli_query(getDatabase(), $sql);
$row = mysqli_fetch_array($result);
echo json_encode($row);
?>