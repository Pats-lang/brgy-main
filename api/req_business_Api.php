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
    'status' => false,
    'message' => ''
);

$bname = $_POST['bname'];
$oname = $_POST['oname'];
$kof_business = $_POST['kof_business'];
$yrs_res = $_POST['yrs_res'];
$contact = $_POST['contact_no'];
$purpose = $_POST['purpose'];
$email = $_POST['email'];
$status = 0;

if ($preparedSql = $conn->prepare("INSERT INTO `request_busclearance` (`business_name`, `owner_name`, `kof_business`, `yrs_res`, `contact_no`, `purpose`, `email`, `status`) VALUES (?,?,?,?,?,?,?,?)")) {
    $preparedSql->bind_param("sssiisss", $bname, $oname, $kof_business, $yrs_res, $contact, $purpose, $email, $status);

    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = "Successfully";
    } else {
        $response['status'] = false;
        $response['message'] = "Failed to insert data: " . $preparedSql->error;
    }

    $preparedSql->close();
}

echo json_encode($response);
