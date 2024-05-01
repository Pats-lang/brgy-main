<?php
session_start();

if (isset($_POST['otp'])) {
    $userOTP = $_POST['otp'];

    // Check if the OTP session variable exists
    if (isset($_SESSION['otp'])) {
        $storedOTP = $_SESSION['otp'];

        if ($userOTP === $storedOTP) {
            // OTP is valid
            // Unset otp and otp_sent session variables
            unset($_SESSION['otp']);
            unset($_SESSION['otp_sent']);

            // Set the session variable to indicate OTP verification
            $_SESSION['otp_verified'] = true;

            $response = array(
                'status' => 'success',
                'message' => 'OTP verification successful!'
            );
        } else {
            // Invalid OTP
            $response = array(
                'status' => 'error',
                'message' => 'Invalid OTP'
            );
        }
    } else {
        // OTP session variable not set
        $response = array(
            'status' => 'error',
            'message' => 'OTP session not found. Please request a new OTP.'
        );
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
