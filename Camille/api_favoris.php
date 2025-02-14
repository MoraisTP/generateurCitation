<?php
header("Content-Type: application/json");
session_start();
require "config.php";

if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT c.id, c.texte, c.auteur FROM favoris f 
                      JOIN citations c ON f.citations_id = c.id
                      WHERE f.user_id = ?");
$stmt->execute([$user_id]);
$favoris = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($favoris);
?>