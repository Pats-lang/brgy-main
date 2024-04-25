<?php
include '../config/connection.php';
session_start();
$response = array();

// Check if id is set and not empty
if (isset($_POST['id']) && !empty($_POST['id'])) {
    // Sanitize the id to prevent SQL injection
    $id = mysqli_real_escape_string(getDatabase(), $_POST['id']);


    $sql = "SELECT transaction_id, member_id, request, status FROM request_brgybp
    WHERE transaction_id = '$id'
    UNION
    SELECT transaction_id, member_id, request, status FROM request_brgycert
    WHERE transaction_id = '$id'
    UNION
    SELECT transaction_id, member_id, request, status FROM request_brgyclrs
    WHERE transaction_id = '$id'
    UNION
    SELECT transaction_id, member_id, request, status FROM request_brgycoi
    WHERE transaction_id = '$id'
    UNION
    SELECT transaction_id, member_id, request, status FROM request_busclearance
    WHERE transaction_id = '$id'";
$result = mysqli_query(getDatabase(), $sql);


    




    // Check if query was successful
    if ($result) {
        // Fetch the row
        $row = mysqli_fetch_assoc($result);
        // Check if a row was found
        if ($row) {
            // Mapping array for status values
            $statusMapping = array(
                0 => 'pending', 
                1 => 'rejected',
                2 => 'accepted'
            );

            // Replace numeric status with status message
            $status = $statusMapping[$row['status']];

            // Filter only the required fields
            $filteredRow = array(
                'member_id' => $row['member_id'],
                'transaction_id' => $row['transaction_id'],
                'request' => $row['request'],
                'status' => $status
            );

            // Encode the filtered row as JSON and send it as response
            echo json_encode($filteredRow);
        } else {
            // No row found
            echo json_encode(array('error' => 'No data found for the given ID.'));
        }
    } else {
        $errorMsg = mysqli_error(getDatabase());
    echo json_encode(array('error' => 'Query failed: ' . $errorMsg));   
    }
} else {
    // ID not set or empty
    echo json_encode(array('error' => 'ID not provided.'));  
}
