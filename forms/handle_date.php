<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function validate_date($date_str) {
        // Convert string to DateTime object
        $dateObj = DateTime::createFromFormat("Y-m-d", $date_str);
        
        // Validate format
        if (!$dateObj || $dateObj->format("Y-m-d") !== $date_str) {
            return false; // Invalid date
        }
        return $dateObj; // Valid date
    }

    // Get Input
    $dob = isset($_POST["dob"]) ? $_POST["dob"] : "";
    $appointment = isset($_POST["appointment"]) ? $_POST["appointment"] : "";

    // Validate Date of Birth (Past Only)
    if ($dob !== "") {
        $dob_obj = validate_date($dob);
        if (!$dob_obj) {
            die("Error: Invalid Date of Birth format.");
        }
        
        $today = new DateTime();
        if ($dob_obj > $today) {
            die("Error: Date of Birth cannot be in the future.");
        }
    }

    // Validate Appointment Date (Future Only)
    if ($appointment !== "") {
        $appointment_obj = validate_date($appointment);
        if (!$appointment_obj) {
            die("Error: Invalid Appointment Date format.");
        }
        
        $today = new DateTime();
        if ($appointment_obj < $today) {
            die("Error: Appointment must be a future date.");
        }
    }

    // Display Results
    echo "<h2>Validated Dates</h2>";
    echo "<strong>Date of Birth:</strong> " . $dob_obj->format("l, d F Y") . " ✅<br>";
    echo "<strong>Appointment Date:</strong> " . $appointment_obj->format("l, d F Y") . " ✅<br>";

    // Extra: Calculate Age from DOB
    $age = $dob_obj->diff($today)->y;
    echo "<strong>Your Age:</strong> $age years old.<br>";

    // Extra: Days Left for Appointment
    $days_left = $today->diff($appointment_obj)->days;
    echo "<strong>Days Until Appointment:</strong> $days_left days.<br>";
}
?>
