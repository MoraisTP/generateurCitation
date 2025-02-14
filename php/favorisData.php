<?php
header("Content-Type: application/json");
session_start();
require "config.php";

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Non connecté"]);
    exit();
}

$user_id = $_SESSION['user_id'];
$data = json_decode(file_get_contents("php://input"), true);
$citation_id = $data['citations_id'] ?? null;

if (!$citation_id) {
    echo json_encode(["status" => "error", "message" => "ID citation manquant"]);
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM favoris WHERE user_id = ? AND citations_id = ?");
    $stmt->execute([$user_id, $citation_id]);
    $existe = $stmt->fetchColumn();

    if ($existe) {
        $stmt = $pdo->prepare("DELETE FROM favoris WHERE user_id = ? AND citations_id = ?");
        $stmt->execute([$user_id, $citation_id]);
        echo json_encode(["status" => "removed"]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO favoris (user_id, citations_id) VALUES (?, ?)");
        $stmt->execute([$user_id, $citation_id]);
        echo json_encode(["status" => "added"]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}

?>
