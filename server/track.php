<?php
include '../config/connection.php';
session_start();
$response = array();

// Check if id is set and not empty
if (isset($_POST['id']) && !empty($_POST['id'])) {
    // Sanitize the id to prevent SQL injection
    $id = mysqli_real_escape_string(getDatabase(), $_POST['id']);

    // Perform the SQL query
    $sql = "SELECT account_id, name, request, status FROM `request_brgycoi` WHERE `transaction_id` = '$id'";
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
                1 => 'accepted',
                2 => 'rejected'
            );

            // Replace numeric status with status message
            $status = $statusMapping[$row['status']];

            // Filter only the required fields
            $filteredRow = array(
                'account_id' => $row['account_id'],
                'name' => $row['name'],
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
        // Query failed
        echo json_encode(array('error' => 'Query failed: ' . mysqli_error(getDatabase())));
    }
} else {
    // ID not set or empty
    echo json_encode(array('error' => 'ID not provided.'));
}
