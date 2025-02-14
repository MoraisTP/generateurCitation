<?php
session_start();
include 'config.php';


if (!isset($_SESSION["user_id"])) {
    header("Location: connexion.php");
    exit;
}


$user_id = $_SESSION["user_id"];
$stmt = $pdo->prepare("SELECT nom, prenom, pseudo, email FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if (!$user) {
    echo "Utilisateur introuvable.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="hd-navbar">
        <div id="logo">
            <a href="#"><img src="../Images/Logo_super_hero.png" alt=""></a>
        </div>


        <nav>
            <div class="hd-mobil">
                <label for="burger" class="burger-menu"><i class="fa-solid fa-bars"></i></label>
                <input type="checkbox" id="burger">
                <div class="main_pages">
                    <a href="#">Citation</a>
                </div>
            </div>
            <ul class="hd-nav-links">
                <li class="hd-desk"><a href="index.html">Citation</a></li>
            </ul>

        </nav>
    </div>
</header>

<div class="pf-container">
    <div class="pf-box">
        <a href="logout.php">Se déconnecter</a>
        <h2>Bienvenue, <?= htmlspecialchars($user["prenom"]) ?> !</h2>
        <div class="pf-info">
            <p><strong>Nom :</strong> <?php echo htmlspecialchars($user["nom"]) ?></p>
            <p><strong>Prénom :</strong> <?php echo htmlspecialchars($user["prenom"]) ?></p>
            <p><strong>Pseudo :</strong> <?php echo htmlspecialchars($user["pseudo"]) ?></p>
            <p><strong>Email :</strong> <?php echo htmlspecialchars($user["email"]) ?></p>
        </div>

        <!--Section favoris-->
        <section class="fav-item">
            <h2>Mes citations favorites</h2>
            <ul id="favoris-list"></ul>
        </section>

    </div>
</div>


<footer>
    <div class="ft-fouter">
        <p>©Camille -</p>
        <p><a href="">- Mentions Légales</a></p>
    </div>
</footer>


<script src="api_favoris.js"></script>
</body>
</html>
