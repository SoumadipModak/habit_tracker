<?php
// add_habit.php

require_once 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$user_id = $data['user_id'];
$name = $data['name'];
$description = $data['description'];
$frequency = $data['frequency'];
$target_amount = $data['target_amount'];

$sql = "INSERT INTO habits (user_id, name, description, frequency, target_amount)
        VALUES (:user_id, :name, :description, :frequency, :target_amount)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':frequency', $frequency);
    $stmt->bindParam(':target_amount', $target_amount);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Habit added successfully"]);
    } else {
        echo json_encode(["error" => "Failed to add habit"]);
    }
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
