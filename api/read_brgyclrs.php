<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u907822938_barangaydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = array(
    'id' => '',
    'name' => '',
    'request' => '',
    'status' => ''
);

$id = isset($_POST['id']) ? $_POST['id'] : '';

// Create a new prepared statement
if ($preparedSql = $conn->prepare("SELECT r.id, r.name, r.request, r.status, u.* FROM `request_brgyclrs` r LEFT JOIN `user_account` u ON r.id = u.account_id WHERE r.id = ?")) {
    $preparedSql->bind_param("i", $id);

    if ($preparedSql->execute()) {
        $result = $preparedSql->get_result();

        if ($row = $result->fetch_assoc()) {
            $response['id'] = $row['id'];
            $response['name'] = $row['name'];
            $response['request'] = $row['request'];
            $response['status'] = $row['status'];

            // Include the user data in the response
            $response['user_data'] = $row;
        }
    } else {
        echo "Error executing SELECT query: " . $preparedSql->error;
    }

    // Close the prepared statement
    $preparedSql->close();
} else {
    echo "An error occurred while preparing the SELECT statement:" . $conn->error;
}

// Output the JSON-encoded response
echo json_encode($response);
