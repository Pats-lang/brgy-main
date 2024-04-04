<?php
include './config/connection.php';
session_start();

$response = array(
    'status' => false,
    'message' => '',
);

// Sanitize each input field
// Sanitize each input field only if it's set
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

// Example query to insert data into request_brygcoi table
$query = "INSERT INTO request_brgyclrs (transaction_id, name, request, yrs_res, address, email, contact_no, purpose, status) VALUES ('$transaction_id','$name', '$request', '$residency', '$address', '$email', '$contact', '$purpose', '$status')";

// Execute the query
$result = mysqli_query(getDatabase(), $query);

if ($result) {
    // Query executed successfully
    $response['status'] = true;
    $response['message'] = 'Request send successfully';
} else {
    // Query failed
    $response['message'] = 'Error sending request: ' . mysqli_error(getDatabase());
}

// Send response back to the client
echo json_encode($response);
?>
