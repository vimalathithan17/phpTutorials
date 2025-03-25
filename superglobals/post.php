<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        echo "Welcome, " . htmlspecialchars($_POST["username"]) . "!";
    } else {
        echo "Please fill all fields.";
    }
}