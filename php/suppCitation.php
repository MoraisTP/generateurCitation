<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Accès refusé.");
}

$citation_id = $_POST['citations_id'];

$stmt = $pdo->prepare("SELECT COUNT(*) FROM favoris WHERE citations_id = ?");
$stmt->execute([$citation_id]);
$est_favori = $stmt->fetchColumn();

if ($est_favori == 0) {
    $stmt = $pdo->prepare("DELETE FROM citations WHERE id = ?");
    $stmt->execute([$citation_id]);
}

header("Location: admin.php");
?>
