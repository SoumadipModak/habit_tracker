<?php
// update_progress.php

require_once 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$habit_id = $data['habit_id'];
$entry_date = $data['entry_date'];
$value = $data['value'];
$completed = $data['completed'];

$sql = "INSERT INTO habit_entries (habit_id, entry_date, value, completed)
        VALUES (:habit_id, :entry_date, :value, :completed)
        ON DUPLICATE KEY UPDATE 
            value = VALUES(value), 
            completed = VALUES(completed)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':habit_id', $habit_id);
    $stmt->bindParam(':entry_date', $entry_date);
    $stmt->bindParam(':value', $value);
    $stmt->bindParam(':completed', $completed);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Progress updated successfully"]);
    } else {
        echo json_encode(["error" => "Update failed"]);
    }
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
