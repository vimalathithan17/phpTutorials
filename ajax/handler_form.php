<?php
header("Content-Type: application/json"); // Send JSON response

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $message = trim($_POST["message"]);

    // Simple validation
    if (empty($name) || empty($message)) {
        echo json_encode(["message" => "Error: Fields cannot be empty!"]);
        exit;
    }

    // Sanitize inputs
    $safe_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $safe_message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

    // Response
    echo json_encode(["message" => "Hello $safe_name, you said: '$safe_message'"]);
    exit;
}

echo json_encode(["message" => "Invalid Request"]);
exit;
