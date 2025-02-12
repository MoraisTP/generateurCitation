<?php
header("Content-Type: application/json");
session_start();
require "config.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo json_encode(["status" => "error", "message" => "Accès refusé"]);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);
$texte = $data['texte'];
$auteur = $data['auteur'];

$stmt = $pdo->prepare("INSERT INTO citations (texte, auteur) VALUES (?, ?)");
$stmt->execute([$texte, $auteur]);

echo json_encode(["status" => "success"]);
?>
