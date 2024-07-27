<?php
$apiKey = '02df1556da4c4822b385002ad2e180e8';

// Set the email address to verify
$email = 'example@example.com';

// Set the IP address (optional)
$ipAddress = '127.0.0.1';

// Initialize the curl session
$ch = curl_init();

// Set the API endpoint and headers
curl_setopt($ch, CURLOPT_URL, 'https://api.zerobounce.net/v2/validate');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
    'api_key' => $apiKey,
    'email' => $email,
    'ip_address' => $ipAddress
)));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/x-www-form-urlencoded'
));

// Execute the curl request
$response = curl_exec($ch);

// Check for curl errors
if (curl_errno($ch)) {
    echo 'Curl error: '. curl_error($ch). "\n";
}

// Get the curl info
$info = curl_getinfo($ch);

// Close the curl session
curl_close($ch);

// Check if the API response is empty
if (empty($response)) {
    echo "Error: API response is empty\n";
    echo "HTTP Code: {$info['http_code']}\n";
} else {
    // Try to parse the API response as JSON
    $responseData = json_decode($response, true);
    if ($responseData === null) {
        echo "Error: Unable to parse API response\n";
    } else {
        // Process the API response data
        $status = $responseData['status'];
        echo "Email Status: $status\n";
        // You can also check other response data, such as:
        // $responseData['sub_status']
        // $responseData['free_email']
        // $responseData['did_you_mean']
        // etc.
    }
}

?>