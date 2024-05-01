<?php

include '../config/connection.php';

// Get the item ID from the Ajax request
$item_id = $_POST['item_id'];

// SQL query to get the available stocks for the item
$sql = "SELECT `stocks` FROM `barangay_inventory` WHERE `id` = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("i", $item_id);
$stmt->execute();
$stmt->bind_result($stocks);
$stmt->fetch();
$stmt->close();

// Check if stocks are available
if ($stocks > 0) {
    // Return the available stocks as JSON
    echo json_encode(['stocks' => $stocks]);
} else {
    // Return response indicating no available slots
    echo json_encode(['error' => 'No available slots']);
}

$db->close();
?>
