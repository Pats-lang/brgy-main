<?php 
include '../config/connection.php';
session_start();
$response = array(
   
);  

$id = sanitizeData(getDatabase(), $_POST['id']);

$sql = "SELECT * FROM `request_brgycor` WHERE `id` = '$id' ";
$result = mysqli_query(getDatabase(), $sql);
$row = mysqli_fetch_array($result);

echo json_encode($row);

$mpdf->WriteHTML($pdfContent);
$mpdf->Output($pdfFilePath, 'F');
$current_dt = (new DateTime())->format('Y-m-d H:i:s');

$insertQuerty = "INSERT INTO `generatedpdf_id` (`generated_file`,`admin`  )
VALUES ('$pdfFilePath','$admin_username','3','$current_dt')";
$insertResult = mysqli_query(getDatabase(), $insertQuerty);

$response = array(
'success' => true,
'message' => 'PDF generated and saved successfully.',
'pdf_file_name' => $pdfFileName,
'pdf_file_url' => $pdfFilePath,
'admin_username' => $admin_username
);

?>