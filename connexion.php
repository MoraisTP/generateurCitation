<?php
session_start();
include 'config.php';

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
            header("Location: profil.php");
        }
        exit;
    } else {
        echo "Mot de passe incorrect";
    }

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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


<form action="" method="POST">
    <div class="form-box">
        <h1>CONNEXION</h1>
        <div class="input-box">
            <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo..." required>
        </div>
        <div class="input-box">
            <input type="password" id="mdp" name="mdp" placeholder="Mot de passe..." required>
        </div>
        <button class="seConnecter" type="submit">Se connecter</button>
        <p>Pas de compte ? <a href="inscription.php">Inscrivez-vous !</a></p>
    </div>
</form>

<footer>
    <div class="ft-fouter">
        <p>©Camille -</p>
        <p><a href="">- Mentions Légales</a></p>
    </div>
</footer>

</body>
</html>
