<!-- 
 The filter_input() function directly fetches, sanitizes, 
 and validates input from $_GET, $_POST, $_COOKIE, $_SERVER, and $_ENV.
 filter_input(type, variable_name, filter, options);

    type: The input source (INPUT_GET, INPUT_POST, INPUT_COOKIE, INPUT_SERVER, INPUT_ENV).

    variable_name: The name of the input field.

    filter: The filter type (e.g., FILTER_SANITIZE_STRING, FILTER_VALIDATE_EMAIL).

    options: Optional array for additional validation rules.
 -->
 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $age = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 120]]);
    $website = filter_input(INPUT_POST, "website", FILTER_VALIDATE_URL);

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
    <title>Using filter_input()</title>
</head>
<body>
    <h2>Sanitize & Validate with filter_input()</h2>

    <form method="post">
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
