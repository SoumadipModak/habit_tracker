<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'habit_tracker'); // Change to your database name
define('DB_USER', 'users');         // Change to your DB username
define('DB_PASS', '');              // Change to your DB password

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS
    );
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
