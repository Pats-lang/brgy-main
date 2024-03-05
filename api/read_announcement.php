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
    'img' => '',
    'title' => '',
    'description' => '',
);

$id = isset($_POST['id']) ? $_POST['id'] : '';

// Create a new prepared statement
if ($preparedSql = $conn->prepare("SELECT `img`, `title`, `description` FROM `announcement` WHERE `id` = ?")) {
    $preparedSql->bind_param("i", $id);

    if ($preparedSql->execute()) {
        $preparedSql->bind_result($img, $title, $description);

        if ($preparedSql->fetch()) {
            $response['img'] = $img;
            $response['title'] = $title;
            $response['description'] = $description;
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
