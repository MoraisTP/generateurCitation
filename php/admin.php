<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Tié pas un copaing.");
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
<?php
include "./header.php"
?>
<video autoplay muted loop id="myVideo" style="
 position: fixed;
  right: 0;
  top: 0;
  min-width: 100%;
  min-height: 100%;
z-index: -99;">
    <source src="/assets/vid/bgadmin.mp4" type="video/mp4">
</video>
<h1 style="margin: 20px;text-align: center;color: white; font-size: 30px">Panneau d'admin :</h1>
<section class="ajoutAdmin">
    <h2 style="color: #fff;">Ajouter une citation :</h2>
    <form action="/php/adminAjout.php" method="POST">
        <input type="text" name="texte" placeholder="Texte de la citation" required>
        <input type="text" name="auteur" placeholder="Auteur" required>
    <button type="submit">Ajouter</button>
</form>
</section>
<section class="supprimerAdmin">
    <h2 style="color: #fff;">Supprimer une citation :</h2>
    <?php
    $stmt = $pdo->query("SELECT id, texte, auteur FROM citations");
    $citations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <ul>
        <?php foreach ($citations as $citation): ?>
            <li>
                "<?= htmlspecialchars($citation['texte']) ?>" - <?= htmlspecialchars($citation['auteur']) ?>
                <form action="suppCitation.php" method="POST" style="display:inline;">
                    <input type="hidden" name="citations_id" value="<?= $citation['id'] ?>">
                    <button type="submit">🗑️ Supprimer ❌</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

</body>
</html>