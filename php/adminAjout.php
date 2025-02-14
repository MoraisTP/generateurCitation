<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Accès refusé.");
}

$texte = $_POST['texte'];
$auteur = $_POST['auteur'];

$stmt = $pdo->prepare("INSERT INTO citations (texte, auteur) VALUES (?, ?)");
$stmt->execute([$texte, $auteur]);
echo '<script>alert("Citation enregistré !");</script>';
header("Refresh:1 /php/admin.php");
?>