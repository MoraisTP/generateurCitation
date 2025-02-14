<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pseudo = trim($_POST["pseudo"]);
    $nom = trim($_POST["nom"]);
    $prenom = trim($_POST["prenom"]);
    $email = trim($_POST["email"]);
    $password = $_POST["mdp"];
    $password_confirm = $_POST["mdpVerif"];

    if ($password !== $password_confirm) {
        die("Mot de passe ne correspond pas !");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (nom, prenom, email, password, pseudo) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, $hashed_password, $pseudo]);
        echo "<p style='position: absolute; padding: 20px; border-radius: 20px; border: 5px solid black; top: 20%; right: 30%; z-index: 10; color: black; background-color: white;'>Vous êtes inscrits ! (normalement) <a href='/php/connexion.php'>Se connecter</a></p>";
    } catch (PDOException $e) {
        echo "Merde : " . $e->getMessage();
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
<!--Sec gauche-->
<section class="bodyInscription">
<div class="container">
    <div class="gauche">
        <div class="bienvenue">
            <h1>Bienvenue !</h1>
            <p>Amusez vous, inspirez vous !</p>
        </div>
    </div>
<!--    Sec droite -->
    <div class="droite">
        <div class="connexion">
            <div class="connexion-titre">
                <h2>S'inscrire</h2>
            </div>
<!--            FORMULAIRE-->
            <form action="sInscrire.php" method="POST">
                <div class="input-box">
                    <label for="pseudo">Pseudo :</label>
                    <input type="text" id="pseudo" name="pseudo" required>
                </div>
                <div class="input-box">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="input-box">
                    <label for="prenom">Prenom :</label>
                    <input type="text" id="prenom" name="prenom" required>
                </div>
                <div class="input-box">
                    <label for="email">Email :</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="input-box">
                    <label for="mdp">Mot de passe :</label>
                    <input type="password" id="mdp" name="mdp" required>
                </div>
                <div class="input-box">
                    <label for="mdpVerif">Vérifier le mot de passe :</label>
                    <input type="password" id="mdpVerif" name="mdpVerif" required>
                </div>
                <button type="submit" class="seConnecter" id="popup" onclick="popup()"> S'inscrire</button>
            </form>
<!--Lien connectez vous-->
            <div class="login-options">
                <a href="/php/connexion.php">Vous avez déjà un compte ? Connectez-vous.</a>
            </div>

        </div>
    </div>
</div>
</section>
<script src="/assets/js/random.js"></script>
</body>