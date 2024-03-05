<?php

include '../config/connection.php';

$response = array();

$admin_username = sanitizeData(getDatabase(), $_POST["username"]);
$admin_password = sanitizeData(getDatabase(), $_POST["password"]);

// Start the session
session_start();

if ($preparedSql = $db->prepare("SELECT username, password, status FROM user_account WHERE username = ?")) {
    $preparedSql->bind_param("s", $admin_username);

    if ($preparedSql->execute()) {
        $preparedSql->bind_result($db_admin_username, $db_admin_password, $db_status);

        if ($preparedSql->fetch()) {
            if (password_verify($admin_password, $db_admin_password)) {
                if ($db_status === 2) {
                    $_SESSION['adminLogged'] = $db_admin_username;
                    $response['status'] = true;
                    $response['icon'] = 'success';
                    $response['message'] = 'Admin Found! Logging in ...';
                    
                } else {
                    $response['icon'] = 'error';
                    $response['message'] = 'You are not verified.';
                }
            } else {
                $response['icon'] = 'error';
                $response['message'] = 'Password verification failed.';
            }
        } else {
            $response['icon'] = 'error';
            $response['message'] = 'User not found.';
        }
    } else {
        $response['icon'] = 'error';
        $response['message'] = 'Error executing SQL query: ' . $preparedSql->error;
    }
    $preparedSql->close();
} else {
    $response['icon'] = 'error';
    $response['message'] = 'An error occurred while preparing the SQL statement: ' . $db->error;
}

echo json_encode($response);
?>
