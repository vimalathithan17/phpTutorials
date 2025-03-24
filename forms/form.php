<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Secure function to clean input
    function clean_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Get raw input values
    $name = isset($_POST["name"]) ? clean_input($_POST["name"]) : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : ""; // Validate, not sanitize
    $age = isset($_POST["age"]) ? $_POST["age"] : ""; // Validate, not sanitize
    $dob = isset($_POST["dob"]) ? $_POST["dob"] : ""; // Validate date
    $gender = isset($_POST["gender"]) ? clean_input($_POST["gender"]) : "";
    $country = isset($_POST["country"]) ? clean_input($_POST["country"]) : "";
    $hobbies = isset($_POST["hobbies"]) ? $_POST["hobbies"] : [];
    $bio = isset($_POST["bio"]) ? clean_input($_POST["bio"]) : "";
    $color = isset($_POST["color"]) ? clean_input($_POST["color"]) : "";
    $skill_level = isset($_POST["skill_level"]) ? filter_var($_POST["skill_level"], FILTER_VALIDATE_INT) : "";
    $password = isset($_POST["password"]) ? password_hash($_POST["password"], PASSWORD_BCRYPT) : "";

    //  Validate Required Fields
    if (empty($name) || empty($email) || empty($gender) || empty($password)) {
        die("Error: Required fields are missing.");
    }

    //  Validate Email Properly
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Invalid email format.");
    }

    //  Validate Age (Not just sanitize)
    if ($age !== "") {
        if (!filter_var($age, FILTER_VALIDATE_INT)) {
            die("Error: Age must be a valid number.");
        }
        if ($age < 1 || $age > 100) {
            die("Error: Age must be between 1 and 100.");
        }
    }

    //  Validate & Convert DOB
    if (!empty($dob)) {
        $dateObj = DateTime::createFromFormat("Y-m-d", $dob); // Converts string to DateTime
        if (!$dateObj || $dateObj->format("Y-m-d") !== $dob) {
            die("Error: Invalid date format. Use YYYY-MM-DD.");
        }

        // Check if DOB is in the future
        $today = new DateTime();
        if ($dateObj > $today) {
            die("Error: Date of Birth cannot be in the future.");
        }
    }

    // Display the sanitized and validated input
    echo "<h2>Submitted Data:</h2>";
    echo "<strong>Name:</strong> " . $name . "<br>";
    echo "<strong>Email:</strong> " . $email . "<br>";
    echo "<strong>Age:</strong> " . ($age ? $age : "Not provided") . "<br>";
    echo "<strong>Date of Birth:</strong> " . ($dob ? $dob : "Not provided") . "<br>";
    echo "<strong>Gender:</strong> " . ucfirst($gender) . "<br>";
    echo "<strong>Country:</strong> " . ucfirst($country) . "<br>";
    echo "<strong>Hobbies:</strong> " . (!empty($hobbies) ? implode(", ", $hobbies) : "None") . "<br>";
    echo "<strong>Bio:</strong> " . nl2br($bio) . "<br>";
    echo "<strong>Favorite Color:</strong> <span style='color:$color;'>$color</span><br>";
    echo "<strong>Skill Level:</strong> " . ($skill_level !== false ? $skill_level : "Invalid") . "/10<br>";
    echo "<strong>Password:</strong> (Stored securely)<br>";
}
?>
