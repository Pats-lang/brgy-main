<?php
include '../config/connection.php';
session_start();

$response = array();

// Assuming sanitizeData() and getDatabase() functions are defined elsewhere

$edit_Id = sanitizeData(getDatabase(), $_POST['id']);
$edit_lastModifiedAnnouncements = sanitizeData(getDatabase(), $_POST['status']);
$name = sanitizeData(getDatabase(), $_POST['register_name']);
$address = sanitizeData(getDatabase(), $_POST['register_address']);
$request = sanitizeData(getDatabase(), $_POST['register_request']);
$purpose = sanitizeData(getDatabase(), $_POST['register_purpose']);
$residency = sanitizeData(getDatabase(), $_POST['register_Residency']);
$email = sanitizeData(getDatabase(), $_POST['register_email']);

// Assuming $db is your database connection object
if ($preparedSql = $db->prepare("UPDATE `request_brgycert` SET `status` = ? WHERE id = ?")) {
    $preparedSql->bind_param("ii", $edit_lastModifiedAnnouncements, $edit_Id);
    
    if ($preparedSql->execute()) {
        // Inner join query to retrieve contact_no and firstname
        $citizenQuery = "SELECT rb.contact_no, m.firstname
        FROM request_brgycoi rb
        INNER JOIN members m ON rb.member_id = m.member_id 
        WHERE rb.id = ?";

        // Prepare and bind parameters for citizen query
        if ($citizenStmt = $db->prepare($citizenQuery)) {
            $citizenStmt->bind_param("i", $edit_Id);
            
            // Execute citizen query
            if ($citizenStmt->execute()) {
                $citizenResult = $citizenStmt->get_result();
                if ($citizenResult->num_rows > 0) {
                    $citizenData = $citizenResult->fetch_assoc();

                    // Assign values to separate variables
                    $contact_no = $citizenData['contact_no'];
                    $firstname = $citizenData['firstname'];

                    // Pass the values to the response array
                    $response['applicant_num'] = $contact_no;
                    $response['applicant_name'] = $firstname;
                    $response['applicant_status'] = $edit_lastModifiedAnnouncements;

                    $response['status'] = true;
                    $response['message'] = 'Successfully retrieved citizen data.';
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
    $response['message'] = "An error occurred while preparing the UPDATE statement: " . $db->error;
    http_response_code(500); // Internal Server Error
}

echo json_encode($response);
?>
