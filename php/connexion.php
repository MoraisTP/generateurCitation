<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pseudo = trim($_POST["pseudo"]);
    $password = $_POST["mdp"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE pseudo = ?");
    $stmt->execute([$pseudo]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["nom"] = $user["nom"];
        $_SESSION["role"] = $user["role"];
        $_SESSION["loggedin"] = TRUE;
        if ($user['role'] === 'admin') {
            header("Location: /php/admin.php");
        } else {
            setcookie("username", $user["nom"], time() + 3600);
            $_SESSION['message'] = "Vous êtes connecté avec : " . $user["nom"];
            header("Location: /index.php");
        }
        exit;
    } else {
        echo "Mot de passe incorrect";
    }

}
?>

<!DOCTYPE html>
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

<section class="bodyConnexion">
<!--Partie gauche-->
<div class="container">
    <div class="gauche">
        <div class="bienvenue">
            <h1>Bienvenue !</h1>
            <p>Amusez vous, inspirez vous !</p>
        </div>
    </div>
<!--    Partie droite-->
    <div class="droite">
        <div class="connexion">
            <div class="connexion-titre">
                <h2>Se connecter</h2>
            </div>
            <form action="" method="POST">
                <div class="input-box">
                    <label for="pseudo">Pseudo:</label>
                    <input type="text" id="pseudo" name="pseudo" required>
                </div>
                <div class="input-box">
                    <label for="mdp">Mot de passe :</label>
                    <input type="password" id="mdp" name="mdp" required>
                </div>
                <button class="seConnecter" type="submit">Se connecter</button>
            </form>

            <div class="login-options">
                <a href="">Mot de passe oublié ?</a>
                <a href="/php/sInscrire.php">Pas de compte ? Créez ICI !</a>
            </div>

        </div>
    </div>
</div>
</section>
<!-- Font Awesome CDN Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="/assets/js/random.js"></script>
</body>

