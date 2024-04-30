<?php

// Configuration 
$config = array(
    'sms.http.url' => 'https://www.traccar.org/sms',
    'sms.http.authorization' => 'eRC0dR8dQ12LL9BUxRTjUM:APA91bGk1bZpHHVhnGpzEiD2C3IgDILWkODUgX1bfywygi99gODvc6PHxvq-7BVnELT8m8_reZx4td5pGq4e5ybZNhmrJqhDNkBF6a2dUMJ2ae26CiLkTgEXPJCxOHt-iDdcjSCKxln2',
    'sms.http.template' => '{"to": "{phone}", "message": "{message}"}',
);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get phone number and message from the form
    $to = $_POST['cellphone'];
    $message = $_POST['message'];

    // Initialize cURL session
    $ch = curl_init();

    // Prepare the data
    $data = array(
        'to' => $to,
        'message' => $message
    );

    // Prepare the request body
    $requestBody = str_replace(array('{phone}', '{message}'), array($data['to'], $data['message']), $config['sms.http.template']);

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
