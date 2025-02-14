<?php
header("Content-Type: application/json");
$pdo = new PDO("mysql:host=localhost;dbname=citationsDB", "root", "");
$query = $pdo->query("SELECT * FROM citations ORDER BY RAND() LIMIT 1");
$citation = $query->fetch(PDO::FETCH_ASSOC);

echo json_encode($citation);
?>