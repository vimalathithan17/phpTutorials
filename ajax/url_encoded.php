<?php
header("Content-Type: application/json"); // Respond with JSON

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Fetch data from $_POST (automatically parsed for URL-encoded form submissions)
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    // Validate input
    if (empty($username) || empty($password)) {
        echo json_encode(["message" => "Error: Fields cannot be empty!"]);
        exit;
    }

    // Sanitize input
    $safe_username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

    // Dummy authentication check
    if ($safe_username === "admin" && $password === "password123") {
        echo json_encode(["message" => "Login Successful! Welcome, $safe_username"]);
    } else {
        echo json_encode(["message" => "Invalid username or password!"]);
    }
    exit;
}

// If accessed without POST request, show an error
echo json_encode(["message" => "Invalid Request"]);
exit;
