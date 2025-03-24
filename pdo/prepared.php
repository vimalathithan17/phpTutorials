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


    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->execute([
        'username' => "vimal",
        'password' => 'dumal',
    ]);
    $user = $stmt->fetch();

    //prepare() and bindParam() (Bind Parameters One by One)
    $stmt = $pdo->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $email);

    $username = 'jane_doe';
    $email = 'jane@example.com';
    $stmt->execute();

    // another way
    $username = "JohnDoe";
    $age = 25;

    // Bind parameters (variables are passed by reference)
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":age", $age);

    //fetch() – Fetch Single Row
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute(['john_doe']);
    $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch as associative array

    echo $user['email'];

    //fetchAll() – Fetch Multiple Rows
    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        echo $user['username'] . "<br>";
    }

    //Update
    $stmt = $pdo->prepare("UPDATE users SET email = :email WHERE username = :username");
    $stmt->execute([
        'email' => 'new_email@example.com',
        'username' => 'john_doe'
    ]);

    //Delete
    $stmt = $pdo->prepare("DELETE FROM users WHERE username = ?");
    $stmt->execute(['john_doe']);

    $pdo=null;
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>