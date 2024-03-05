<?php
 
function getDatabase() {
    $dbHost = 'localhost';

    $dbUsername = 'root';
  
    $dbPassword = '';
      $dbName = 'u907822938_barangaydb';
      
    $connection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

    if (!$connection) {
        die("Can't connect to the database server. Error: " . mysqli_connect_error());
    }
    return $connection;
}
$db = getDatabase(); 
function sanitizeData($connection, $data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($connection, $data);
    return $data;
}
?>
