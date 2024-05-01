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

// Define your function to retrieve existing image name based on announcement ID
function getExistingImageName($inventoryId) {
    global $db; // Assuming $db is your database connection object

    $query = "SELECT picture FROM barangay_inventory WHERE id = ?";
    
    if ($stmt = $db->prepare($query)) {
        $stmt->bind_param("i", $inventoryId);
        $stmt->execute();
        $stmt->bind_result($existingImageName);

        if ($stmt->fetch()) {
            $stmt->close();
            return $existingImageName;
        }
    }

    return null;
}

$uploadDirectory = "../assets/images/item/";
$edit_Imageitem = isset($_FILES['edit_Imageitem']) ? $_FILES['edit_Imageitem']['name'] : null;
$edit_ImageitemTmpName = isset($_FILES['edit_Imageitem']) ? $_FILES['edit_Imageitem']['tmp_name'] : null;

// Check if an image is uploaded
if (!empty($edit_Imageitem)) {
    // If an image is uploaded, move it to the upload directory
    move_uploaded_file($edit_ImageitemTmpName, $uploadDirectory . $edit_Imageitem);
} else {
    // If no image is uploaded, keep the existing image name in the database
    $edit_Idinventory = sanitizeData(getDatabase(), $_POST['id']);
    $existingImageName = getExistingImageName($edit_Idinventory);

    if ($existingImageName) {
        // Use the existing image name
        $edit_Imageitem = $existingImageName;
    } else {
        // Handle the case where no existing image name is found (perhaps set to a default or handle as needed)
        $edit_Imageitem = null;
    }
}

$edit_ItemName = sanitizeData(getDatabase(), $_POST['edit_ItemName']);
$edit_stocks = sanitizeData(getDatabase(), $_POST['edit_stocks']);
$inventoryid = sanitizeData(getDatabase(), $_POST['id']);


if ($preparedSql = $db->prepare("UPDATE `barangay_inventory` SET `picture`= ?, `item_name`= ?, `stocks` = ? WHERE id = ?")) {
    $preparedSql->bind_param("ssii", $edit_Imageitem, $edit_ItemName, $edit_stocks, $inventoryid);
    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully updated announcement details.';
        $response['admin'] = $_SESSION['adminLogged'];
        $response['operation'] = "edit";
        $response['description'] = "Inventory: <b>" . strtoupper($edit_ItemName) . "</b> has been updated at <b>barangay Inventory.</b>";
    } else {
        $response['status'] = false;
        $response['message'] = "Failed to update announcement information: " . $preparedSql->error;
        http_response_code(500); // Internal Server Error
    }
    $preparedSql->close();

    // Move this inside the if-else block
    echo json_encode($response);
} else {
    $response['status'] = false;
    $response['message'] = "An error occurred while preparing the UPDATE statement:" . $db->error;
    http_response_code(500); // Internal Server Error

    echo json_encode($response);
}

?>
