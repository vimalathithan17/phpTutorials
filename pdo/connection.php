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

    echo "Connected successfully!";

    $pdo=null;//close connection
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
