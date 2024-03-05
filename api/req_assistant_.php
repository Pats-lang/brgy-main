<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u907822938_barangaydb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = array(
    'status' => false,
    'message' => ''
);
$name = $_POST['name'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$purpose = $_POST['purpose'];
$request = $_POST['request'];
$email = $_POST['email'];
$status = 0;

if ($preparedSql = $conn->prepare("INSERT INTO `request_assistant` (`name`, `address`, `contact`, `purpose`, `request`, `email`, `status`) VALUES (?,?,?,?,?,?,?)")) {
    $preparedSql->bind_param("ssissss", $name, $address, $contact, $purpose, $request, $email, $status);
    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = "Successfully";
    } else {
        $response['status'] = false;
        $response['message'] = "bobo failed";
    }
    $preparedSql->close();
}