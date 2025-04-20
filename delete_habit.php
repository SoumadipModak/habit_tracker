<?php
// delete_habit.php

require_once 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$habit_id = $data['habit_id'];

$sql = "DELETE FROM habits WHERE id = :habit_id";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':habit_id', $habit_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Habit deleted successfully"]);
    } else {
        echo json_encode(["error" => "Delete failed"]);
    }
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
