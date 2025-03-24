<?php
$host = '127.0.0.1';
$dbname = 'test_db';
$user = 'root';
$pass = '';

try {
    // Create a PDO instance (connection)
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

    // Set error mode to Exception (recommended)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $username = "vimal";
    $password = "dumal";

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $pdo->query($sql);  // BAD: Directly inserting user input
    /*Problem:
    If $_GET['username'] = "' OR 1=1 -- ", the SQL becomes:

    SELECT * FROM users WHERE username = '' OR 1=1 --' AND password = ''

    This bypasses authentication and logs in any user! 
    */
    $pdo=null;
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
