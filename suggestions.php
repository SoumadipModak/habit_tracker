<?php
// suggestions.php

require_once 'db.php';

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM ai_suggestions WHERE user_id = ? ORDER BY priority DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);

$suggestions = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($suggestions);
?>
