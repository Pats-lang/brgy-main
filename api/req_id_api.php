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

// Assuming na ang mga fields ay palaging naroroon sa $_POST, i-check ito sa iyong client-side
$pname = $_POST['name'];
$address = $_POST['address'];
$birthday = $_POST['birthday'];
$civilStatus = $_POST['civilStatus'];
$contactNo = $_POST['contactNo'];
$email = $_POST['email'];
$precinctNo = $_POST['precinctNo'];
$gsis_SssNo = $_POST['gsis_SssNo'];
$tinNo = $_POST['tinNo'];
$EmgName = $_POST['EmgName'];
$EmgContactNo = $_POST['EmgContactNo'];
$status =0;

if ($preparedSql = $conn->prepare("INSERT INTO `request_brgyid` (`name`, `address`, `birth_date`, `civil_status`, `contact_no`, `precinct_no`, `gss_sss`, `tin`, `emg_name`, `emg_contact_no`, `email`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)")) {
    $preparedSql->bind_param("ssssisiisis", $pname, $address, $birthday, $civilStatus, $contactNo, $precinctNo, $gsis_SssNo, $tinNo, $EmgName, $EmgContactNo, $email, $status);

    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = "Successfully";
    } else {
        $response['status'] = false;
        $response['message'] = "Failed: " . $preparedSql->error;
    }
    $preparedSql->close();
} else {
    $response['status'] = false;
    $response['message'] = "Prepared statement failed: " . $conn->error;
}
$conn->close();

echo json_encode($response);
?>