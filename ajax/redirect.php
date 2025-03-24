<?php
// Simulate condition for redirect
$redirectTo = "somepage.php";

// Send HTTP 302 Redirect
http_response_code(302);
header("Location: $redirectTo");
exit;
?>
