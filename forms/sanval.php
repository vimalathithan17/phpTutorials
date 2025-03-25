<?php
// Function to sanitize and validate inputs
function sanitizeAndValidate($data, $type) {
    // Trim leading/trailing whitespace
    $data = trim($data);
    
    // Remove harmful HTML and PHP tags
    $data = strip_tags($data);
    
    // Sanitize based on type
    switch ($type) {
        case "string":
            $data = filter_var($data, FILTER_SANITIZE_STRING);
            return $data; // No validation needed

        case "email":
            $data = filter_var($data, FILTER_SANITIZE_EMAIL);
            return filter_var($data, FILTER_VALIDATE_EMAIL) ? $data : false;

        case "url":
            $data = filter_var($data, FILTER_SANITIZE_URL);
            return filter_var($data, FILTER_VALIDATE_URL) ? $data : false;

        case "int":
            $data = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
            return filter_var($data, FILTER_VALIDATE_INT) ? (int) $data : false;

        default:
            return false;
    }
}

// Processing form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeAndValidate($_POST["name"], "string");
    $email = sanitizeAndValidate($_POST["email"], "email");
    $age = sanitizeAndValidate($_POST["age"], "int");
    $website = sanitizeAndValidate($_POST["website"], "url");

    // Check if all inputs are valid
    if ($name && $email && $age && $website) {
        $message = "Success! Data is valid and sanitized.";
    } else {
        $message = "Error: Invalid input detected!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanitization & Validation Example</title>
</head>
<body>
    <h2>PHP Input Sanitization & Validation</h2>

    <form method="post" action="">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="text" name="email" required><br><br>
        Age: <input type="text" name="age" required><br><br>
        Website: <input type="text" name="website" required><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    if (isset($message)) {
        echo "<h3>$message</h3>";
    }
    ?>
</body>
</html>
