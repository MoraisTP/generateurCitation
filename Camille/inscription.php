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

<?php include 'function.php' ?>

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
                    <a href="profil.php">Mon compte</a>
                </div>
            </div>
            <ul class="hd-nav-links">
                <li class="hd-desk"><a href="#">Citation</a></li>
                <li class="hd-desk"><a href="profil.php">Mon Compte</a></li>
            </ul>

        </nav>
    </div>
</header>

<form method="POST">
    <div class="form-box">
        <h1>Inscription</h1>
        <div class="input-box">
            <input type="text" name="nom" id="nom" placeholder="Nom...">
        </div>

        <div class="input-box">
            <input type="text" name="prenom" id="prenom" placeholder="Prenom...">
        </div>

        <div class="input-box">
            <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo...">
        </div>

        <div class="input-box">
            <input type="email" name="email" id="email" placeholder="Email...">
        </div>

        <div class="input-box">
            <input type="password" name="mot_de_passe" id="mdp" placeholder="Mot de passe...">
        </div>

        <button type="submit" name="submit" class="btn-inscription">S'inscrire</button>
        <p>Déjà un compte ? <a href="connexion.php">Conectez-vous !</a></p>
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

