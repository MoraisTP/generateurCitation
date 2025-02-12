<?php
header("Content-Type: application/json");
session_start();
require "config.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo json_encode(["status" => "error"]);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);
$citation_id = $data['citation_id'];

$stmt = $pdo->prepare("DELETE FROM citations WHERE id = ?");
$stmt->execute([$citation_id]);

echo json_encode(["status" => "deleted"]);
?>
