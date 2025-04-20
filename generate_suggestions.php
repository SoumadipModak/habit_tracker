<?php
// generate_suggestions.php

require_once 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$user_id = $data['user_id'];

// Fake AI logic – suggest some healthy habits
$suggestionList = [
    "Drink 2L of water daily",
    "Do 10 minutes of meditation",
    "Take a 15-minute walk",
    "Read 5 pages of a book",
    "Avoid phone 1 hour before bed"
];

$sql = "INSERT INTO ai_suggestions (user_id, suggestion, priority) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);

foreach ($suggestionList as $index => $suggestion) {
    $stmt->execute([$user_id, $suggestion, $index]);
}

echo json_encode(["message" => "Suggestions generated"]);
?>
