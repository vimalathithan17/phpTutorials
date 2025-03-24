<?php
// If a theme is provided, set the cookie
if (isset($_GET['theme'])) {
    setcookie("theme", $_GET['theme'], time() + (7 * 24 * 60 * 60), "/"); // 7-day cookie
    exit;
}

// If delete request is sent, remove cookie
if (isset($_GET['delete'])) {
    setcookie("theme", "", time() - 3600, "/"); // Expire the cookie
    exit;
}
?>
