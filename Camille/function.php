<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = trim($_POST["nom"]);
    $prenom = trim($_POST["prenom"]);
    $pseudo = trim($_POST["pseudo"]);
    $email = trim($_POST["email"]);
    $mot_de_passe = $_POST["mot_de_passe"];

    if (empty($nom) || empty($prenom) || empty($pseudo) || empty($email) || empty($mot_de_passe)) {
        echo "Tous les champs doivent être remplis.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'adresse email est invalide.";
        exit;
    }

    $stmt = $pdo->prepare("SELECT id FROM users WHERE pseudo = ? OR email = ?");
    $stmt->execute([$pseudo, $email]);
    if ($stmt->fetch()) {
        echo "Pseudo ou email déjà utilisé.";
        exit;
    }

    $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (nom, prenom, pseudo, email, password) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$nom, $prenom, $pseudo, $email, $hashed_password])) {
        echo "Inscription réussie. <a href='connexion.php'>Se connecter</a>";
    } else {
        echo "Erreur lors de l'inscription.";
    }
}





?>