!<?php
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
        'username' => '',
        'email' =>'',
        'account' => '',
        'firstname' => '',
        'middlename' => '',
        'lastname' => '',
        'profile' => '',
        'status' => ''

    );

    $id = $_POST['account_id'];

    // Create a new prepared statement
    if ($preparedSql = $conn->prepare("SELECT `account_id`,`username`, `first_name`, `middle_name`, `last_name`, `profile`, `status` FROM `user_account` WHERE `account_id` = ?")) {
        $preparedSql->bind_param("i", $id);

        if ($preparedSql->execute()) {
            $preparedSql->bind_result($account_id, $username, $first_name, $middle_name, $last_name, $profile, $status);

            if ($preparedSql->fetch()) {
                $response['account_id'] = $account_id;
                $response['first_name'] = $first_name;
                $response['username'] = $first_name;
                $response['middle_name'] = $middle_name;
                $response['last_name'] = $last_name;
                $response['profile'] = $profile;
                $response['status'] = $status;
            }
        } else {
            echo "Error executing SELECT query: " . $preparedSql->error;
        }

        // Close the prepared statement
        $preparedSql->close();
    } else {
        echo "An error occurred while preparing the SELECT statement:" . $conn->error;
    }

    // Output the JSON-encoded response
    echo json_encode($response);
    ?>