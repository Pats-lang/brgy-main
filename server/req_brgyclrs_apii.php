<?php
include '../config/connection.php';
session_start();
// Prepare response array
$response = array(

);

// Sanitize each input field only if it's set
$member_id = isset($_POST['member_id']) ? sanitizeData(getDatabase(), $_POST['member_id']) : '';
$transaction_id = isset($_POST['transaction_id']) ? sanitizeData(getDatabase(), $_POST['transaction_id']) : '';
$name = isset($_POST['name']) ? sanitizeData(getDatabase(), $_POST['name']) : '';
$request = isset($_POST['request']) ? sanitizeData(getDatabase(), $_POST['request']) : '';
$residency = isset($_POST['residency']) ? sanitizeData(getDatabase(), $_POST['residency']) : '';
$address = isset($_POST['address']) ? sanitizeData(getDatabase(), $_POST['address']) : '';
$email = isset($_POST['email']) ? sanitizeData(getDatabase(), $_POST['email']) : '';
$contact = isset($_POST['contact']) ? sanitizeData(getDatabase(), $_POST['contact']) : '';
$purpose = isset($_POST['purpose']) ? sanitizeData(getDatabase(), $_POST['purpose']) : '';

// Set default status as 0 (pending)
$status = 0;

$query = "INSERT INTO request_brgyclrs (member_id, transaction_id, name, request, yrs_res, address, email, contact_no, purpose, status) 
          VALUES ('$member_id','$transaction_id','$name', '$request', '$residency', '$address', '$email', '$contact', '$purpose', '$status')";

// Execute the query
$result = mysqli_query(getDatabase(), $query);



if ($result) {
    // Query executed successfully
    $response['status'] = true;
    $response['message'] = 'Request sent successfully';
} else {
    // Query failed
    $response['status'] = false;
    $response['message'] = 'Error sending request: ' . mysqli_error(getDatabase());
}

// Output any error messages for debugging purposes
echo "Error Message: " . $response['message'] . "<br>";

// Send response back to the client
echo json_encode($response);
?>
