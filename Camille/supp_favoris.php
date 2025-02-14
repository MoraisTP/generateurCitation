<?php
session_start();
include "config.php";

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data["citations_id"]) && isset($_SESSION["user_id"])) {
        $citation_id = intval($data["citations_id"]);
        $user_id = $_SESSION["user_id"];

        $sql = "DELETE FROM favoris WHERE user_id = ? AND citations_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $citation_id]);

        if ($stmt->rowCount() > 0) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Favori introuvable"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Données manquantes"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Méthode non autorisée"]);
}
?>