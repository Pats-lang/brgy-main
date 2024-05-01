<?php
include '../config/connection.php';

session_start();
$response = array();
$edit_transactionId = sanitizeData(getDatabase(), $_POST['transaction_id']);
$edit_lastModifiedAnnouncements = sanitizeData(getDatabase(), $_POST['stats']);
$edit_item = sanitizeData(getDatabase(), $_POST['itemname']);

if ($preparedSql = $db->prepare("UPDATE `request_tools` SET `status`= ? WHERE transaction_id =? ")) {
    $preparedSql->bind_param("is", $edit_lastModifiedAnnouncements, $edit_transactionId);

    
    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully updated details.'; 

            // Fetch Barangay Inventory data
$inventoryUpdateQuery = "";

// Check if status is 1 to decrement stocks
if ($edit_lastModifiedAnnouncements == 1) {
    $inventoryUpdateQuery = "UPDATE barangay_inventory SET stocks = stocks - 1 WHERE item_name = ?";
} else {
    // If status is not 1, do not perform the update query
    $inventoryUpdateQuery = "";
}

// Perform the update query if necessary
if (!empty($inventoryUpdateQuery)) {
    if ($inventoryUpdateStmt = $db->prepare($inventoryUpdateQuery)) {
        $inventoryUpdateStmt->bind_param("s", $edit_item);

        // Execute the update query
        if ($inventoryUpdateStmt->execute()) {
            // Stocks updated successfully
        } else {
            $response['status'] = false;
            $response['message'] = "Failed to update stocks in barangay inventory: " . $inventoryUpdateStmt->error;
            http_response_code(500); // Internal Server Error
            echo json_encode($response);
            exit(); // Stop further execution
        }

        $inventoryUpdateStmt->close();
    } else {
        $response['status'] = false;
        $response['message'] = "Error preparing barangay inventory update query: " . $db->error;
        http_response_code(500); // Internal Server Error
        echo json_encode($response);
        exit(); // Stop further execution
    }
}



            $citizenQuery = "SELECT rb.contact, m.firstname
            FROM request_tools rb
            INNER JOIN members m ON rb.member_id = m.member_id 
            WHERE rb.transaction_id = ?";

        // Prepare and bind parameters for citizen query
        if ($citizenStmt = $db->prepare($citizenQuery)) {
            $citizenStmt->bind_param("s", $edit_transactionId);
            
            // Execute citizen query
            if ($citizenStmt->execute()) {
                $citizenResult = $citizenStmt->get_result();
                if ($citizenResult->num_rows > 0) {
                    $citizenData = $citizenResult->fetch_assoc();

                    // Assign values to separate variables
                    $contact_no = $citizenData['contact'];
                    $firstname = $citizenData['firstname'];

                    // Pass the values to the response array
                    $response['applicant_num'] = $contact_no;
                    $response['applicant_name'] = $firstname;
                    $response['applicant_status'] = $edit_lastModifiedAnnouncements;

                    $response['status'] = true;
                    $response['message'] = 'Successfully Updated.';
                } else {
                    $response['status'] = false;
                    $response['message'] = "No matching records found.";
                }
            } else {
                $response['status'] = false;
                $response['message'] = "Error executing inner join query: " . $citizenStmt->error;
                http_response_code(500); // Internal Server Error
            }
            $citizenStmt->close();
        } else {
            $response['status'] = false;
            $response['message'] = "Error preparing inner join query: " . $db->error;
            http_response_code(500); // Internal Server Error
        }

    } else {
        $response['status'] = false;
        $response['message'] = "Failed to update announcement information: " . $preparedSql->error;
        http_response_code(500); // Internal Server Error
    }
    $preparedSql->close();

} else {
    $response['status'] = false;
    $response['message'] = " ~ An error occurred while preparing the UPDATE statement:" . $preparedSql->error . " ~ ";
    http_response_code(500); // Internal Server Error
}

echo json_encode($response);
?>