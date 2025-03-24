<?php
// Set session cookie parameters
session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    'domain' => '',
    'secure' => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start(); // Start session

// Handle form submission and set session
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['role'])) {
        $_SESSION['username'] = htmlspecialchars($_POST['username']);
        $_SESSION['role'] = htmlspecialchars($_POST['role']);
        header("Location: session_example.php"); // Refresh the page to reflect changes
        exit;
    }
}
?>

<h2>Session Info</h2>
<?php
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    echo "Username: " . $_SESSION['username'] . "<br>";
    echo "Role: " . $_SESSION['role'] . "<br>";
    echo '<a href="destroy_session.php">Logout (Destroy Session)</a>';
} else {
    echo "No session data set yet.<br>";
    echo '<a href="set_session.html">Set Session Data</a>';
}
?>
