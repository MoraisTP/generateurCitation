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
    <!--    Metas Données-->
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Générateur de citations !</title>
    <meta content="Un site fun qui permet de générer des citations et de les ajouter en favoris !">
    <meta content="all" name="robots"/>
    <!--    Meta OG-->
    <meta content="Inabeton - Générer des citation aléatoires !" property="og:title"/>
    <meta content="Vous allez postez des messages inspirantes mais vous n'avez pas d'inspi ? Béton est là por vous !"
          property="og:description"/>
    <meta content="https://gitlab.com/HazarAZLAG/web-4-heroes" property="og:url"/>
    <!--Feuilles de style-->
    <link href="/assets/img/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="/assets/css/styles.css" rel="stylesheet"/>
</head>
<body>
<?php
include "./header.php"
?>
<!--BG-->
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
<!--Panneau d'admin-->
<section class="ajoutAdmin">
    <h2 style="color: #fff;">Ajouter une citation :</h2>
    <form action="/php/adminAjout.php" method="POST">
        <input type="text" name="texte" placeholder="Texte de la citation" required>
        <input type="text" name="auteur" placeholder="Auteur" required>
    <button type="submit">Ajouter</button>
</form>
</section>
<!--Sec Supprimer la citation-->
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
<script src="/assets/js/random.js"></script>
</body>
</html>