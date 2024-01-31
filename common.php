<?php

// Replace 'your_image_api_endpoint' and 'your_api_key' with the actual API endpoint and key
$imageApiEndpoint = ''https://api.openai.com/v1/engines/davinci-codex/completions';

$apiKey = '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';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission

    // Retrieve input text from the form
    $inputText = isset($_POST['input_text']) ? $_POST['input_text'] : '';

    //Request the image generation API
    $apiEndpoint = $imageApiEndpoint;
    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer '. $apiKey,
    ];
    $data = [
        'text' => $inputText,
    ];

    $ch = curl_init($apiEndpoint);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    curl_close($ch);

    // Process the API response (replace this with actual processing logic)
    $result = json_decode($response, true);
    $generatedImageUrl = isset($result['image_url']) ? $result['image_url'] : '';

    // Display the generated image URL (replace this with actual display logic)
    echo "Generated Image URL: $generatedImageUrl";
}
?>

