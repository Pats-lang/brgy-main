<?php
session_start(); 

// localhost
// $config = array(
//     'sms.http.url' => 'http://192.168.0.100:8082',
//     'sms.http.authorization' => '28da2fab-7bff-4bae-a877-a0b7d3726b73',
//     'sms.http.template' => '{"to": "{phone}", "message": "{message}"}',
// );

//  <!-- online -->
$config = array(
    'sms.http.url' => 'https://www.traccar.org/sms',
    'sms.http.authorization' => 'eRC0dR8dQ12LL9BUxRTjUM:APA91bGk1bZpHHVhnGpzEiD2C3IgDILWkODUgX1bfywygi99gODvc6PHxvq-7BVnELT8m8_reZx4td5pGq4e5ybZNhmrJqhDNkBF6a2dUMJ2ae26CiLkTgEXPJCxOHt-iDdcjSCKxln2',
    'sms.http.template' => '{"to": "{phone}", "message": "{message}"}',
);

// Function to generate a random OTP
function generateOTP($length = 6) {
    $numbers = '0123456789';
    $otp = '';
    for ($i = 0; $i < $length; $i++) {
        $otp .= $numbers[rand(0, strlen($numbers) - 1)]; // Add 6 random numbers
    }
    return $otp;
}


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get phone number and message from the form
    $to = $_POST['mobile_number'];

    // Generate a random OTP
    // $otp = generateOTP();
    $otp=generateOTP();
     // Store OTP in session variable
     $_SESSION['otp'] = $otp;

    // Concatenate OTP with the message
    $messageWithOTP = "Magandang araw! ang iyong OTP ay $otp. Mula sa E-OSCA Registration, siguruhing ikaw lamang ang nakaka alam nito at huwag ipagkatiwala sa iba.";


    // Prepare the data
    $data = array(
        'to' => $to,
        'message' => $messageWithOTP
    );

    // Prepare the request body
    $requestBody = str_replace(array('{phone}', '{message}'), array($data['to'], $data['message']), $config['sms.http.template']);

    // Initialize cURL session
    $ch = curl_init();

    // Set the URL
    curl_setopt($ch, CURLOPT_URL, $config['sms.http.url']);

    // Set the request method
    curl_setopt($ch, CURLOPT_POST, true);

    // Set the request body
    curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody);

    // Set headers
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: ' . $config['sms.http.authorization'],
        'Content-Type: application/json',
    ));

    // Return response as string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($ch);

    // Check for errors
        if ($response === false) {
            $responseData = array('success' => false, 'message' => 'cURL error: ' . curl_error($ch));
        } else {
            // Check if response indicates success
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($httpCode >= 200 && $httpCode < 300) {
                // Set session variable to indicate message sent
                $_SESSION['message_sent'] = true;
                $responseData = array('success' => true, 'message' => 'Message sent successfully.');
            } else {
                $responseData = array('success' => false, 'message' => 'Failed to send message. HTTP Status Code: ' . $httpCode);
            }
        }

    // Close cURL session
    curl_close($ch);

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($responseData);
}
?>
