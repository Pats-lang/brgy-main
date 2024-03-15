<?php
session_start();
include '../config/connection.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_username = sanitizeData(getDatabase(), $_POST["username"]);
    $admin_password = sanitizeData(getDatabase(), $_POST["password"]);

    if ($preparedSql = $db->prepare("SELECT `username`, `password` FROM `user_account` WHERE `username` = ?")) {
        $preparedSql->bind_param("s", $admin_username);

        if ($preparedSql->execute()) {
            $preparedSql->bind_result($db_admin_username, $db_admin_password);

            if ($preparedSql->fetch()) {
                if (password_verify($admin_password, $db_admin_password)) {
                    $_SESSION['adminLogged'] = $db_admin_username;
                    $response['status'] = true;
                    $response['message'] = 'You Are Logging in...';
                } else {
                    $response['status'] = false;
                    $response['message'] = 'Password verification failed.';
                }
            } else {
                $response['status'] = false;
                $response['message'] = 'User not found.';
            }
        } else {
            $response['status'] = false;
            $response['message'] = 'Error executing SQL query: ' . $preparedSql->error;
        }
        $preparedSql->close();
    } else {
        $response['status'] = false;
        $response['message'] = 'An error occurred while preparing the SQL statement: ' . $db->error;
    }
} else {
    $response['status'] = false;
    $response['message'] = 'Invalid request method.';
}

// Output response as JSON
echo json_encode($response);
?>