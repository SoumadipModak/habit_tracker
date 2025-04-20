<?php
// habits.php

require_once 'db.php';

header('Content-Type: application/json');

// Get all habits
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT * FROM habits ORDER BY created_at DESC");
    echo json_encode($stmt->fetchAll());
    exit;
}

// Add a new habit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    // Using prepared statement
    $sql = "INSERT INTO habits (title, description, frequency) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $data['title']);
    $stmt->bindParam(2, $data['description']);
    $stmt->bindParam(3, $data['frequency']);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Failed to add habit']);
    }
    exit;
}
?>
