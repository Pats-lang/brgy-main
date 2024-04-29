<?php
include '../config/connection.php';
session_start();

$response = array(
    'status' => false,
    'message' => '',
    'admin' => '',
    'operation' => '',
    'description' => ''
);

// Retrieve item ID and action from POST data
$itemId = $_POST['id'] ?? '';
$action = $_POST['action'] ?? '';

// Sanitize the input (assuming the sanitizeData() function is defined)
$itemId = sanitizeData(getDatabase(), $itemId);
$action = sanitizeData(getDatabase(), $action);

// Check if itemId and action are not empty
if (!empty($itemId) && !empty($action)) {
    // Retrieve current stock for the item
    $sqlSelect = "SELECT stocks FROM barangay_inventory WHERE id = ?";
    $stmtSelect = $db->prepare($sqlSelect);
    $stmtSelect->bind_param("i", $itemId);
    $stmtSelect->execute();
    $resultSelect = $stmtSelect->get_result();
    $row = $resultSelect->fetch_assoc();
    $currentStock = $row['stocks'];

    // Update the stock based on the action
    if ($action === 'plus') {
        // Increment the stock
        $newStocks = $currentStock + 1;
    } elseif ($action === 'minus') {
        // Ensure stock doesn't go below 0
        $newStocks = max(0, $currentStock - 1);
    } else {
        // Invalid action
        $response['message'] = 'Invalid action specified.';
        echo json_encode($response);
        exit; // Stop further execution
    }

    // Update query
    $sqlUpdate = "UPDATE barangay_inventory SET stocks = ? WHERE id = ?";
    $stmtUpdate = $db->prepare($sqlUpdate);
    $stmtUpdate->bind_param("ii", $newStocks, $itemId);

    if ($stmtUpdate->execute()) {
        $response['status'] = true;
        $response['message'] = 'Stocks for the item have been updated successfully.';
        $response['admin'] = $_SESSION['adminLogged'];
        $response['operation'] = "edit";
        $response['description'] = "Stocks for item with ID: " . $itemId . " have been updated.";
    } else {
        $response['message'] = 'Failed to update stocks: ' . $stmtUpdate->error;
        http_response_code(500); // Internal Server Error
    }

    $stmtUpdate->close();
} else {
    $response['message'] = 'Missing item ID or action.';
    http_response_code(400); // Bad Request
}

echo json_encode($response);
?>
