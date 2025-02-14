<?php

include 'config.php';


try {
    $sql = "SELECT id, texte, auteur FROM citations ORDER BY RAND() LIMIT 1";
    $stmt = $pdo->query($sql);

    $quote = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($quote) {
        echo json_encode($quote);
    } else {
        echo json_encode(["error" => "Aucune citation trouvée."]);
    }
} catch (PDOException $e) {
    // Gestion des erreurs
    echo json_encode(["error" => "Erreur de base de données : " . $e->getMessage()]);
}

?>