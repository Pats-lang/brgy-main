<?php
session_start();
include '../config/connection.php';

$response = array(
    'status' => false,
    'icon' => '',
    'message' => '',
    'admin' => '',
    'operation' => '',
    'description' => ''
);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_username = sanitizeData(getDatabase(), $_POST["username"]);
    $admin_password = sanitizeData(getDatabase(), $_POST["password"]);

    if ($preparedSql = $db->prepare("SELECT member_account.username, member_account.password 
    FROM member_account 
    INNER JOIN members ON member_account.member_id = members.member_id 
    WHERE member_account.username = ? AND members.status = 1")) {
        $preparedSql->bind_param("s", $admin_username);
 
        $preparedSql->bind_param("s", $admin_username);

        if ($preparedSql->execute()) {
            $preparedSql->bind_result($db_admin_username, $db_admin_password);

            if ($preparedSql->fetch()) {
                if (password_verify($admin_password, $db_admin_password)) {
                    $_SESSION['userLogged'] = $db_admin_username;
                    $response['status'] = true;
                    $response['message'] = 'You Are Logging in...';
                
                } else {
                    $response['status'] = false;
                    $response['message'] = 'Password verification failed.';
                }
            } else {
                $response['status'] = false;
                $response['message'] = 'Account Pending.';
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