<?php
header("Content-Type: application/json"); // Tell browser we are returning JSON

// Get raw JSON input
$jsonInput = file_get_contents("php://input");

// Decode JSON to PHP associative array
$data = json_decode($jsonInput, true);

if (!$data) {
    echo json_encode(["message" => "Invalid JSON data"]);
    exit;
}

// Extract values
$name = trim($data["name"] ?? "");
$email = trim($data["email"] ?? "");
$age = trim($data["age"] ?? "");

// Validate input
if (empty($name) || empty($email) || empty($age)) {
    echo json_encode(["message" => "Error: All fields are required!"]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["message" => "Error: Invalid email format!"]);
    exit;
}

if (!is_numeric($age) || $age < 1) {
    echo json_encode(["message" => "Error: Age must be a valid number!"]);
    exit;
}

// Sanitize data
$safe_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$safe_email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$safe_age = (int)$age;

// JSON Response
$response = [
    "message" => "Hello $safe_name, your email ($safe_email) and age ($safe_age) were received successfully!"
];

echo json_encode($response);
