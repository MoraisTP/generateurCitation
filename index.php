<!DOCTYPE html>
<html lang="fr">
<head>
    <!--    Metas Données-->
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Hero SOS - Les héros à votre disposition !</title>
    <meta content="Hero SOS est une application qui permet de recevoir l'aide d'un super héro proche de vous ! Un incident ? Nos super héros sont là !">
    <meta content="all" name="robots"/>
    <!--    Meta OG-->
    <meta content="Hero SOS - Les héros proches de vous !" property="og:title"/>
    <meta content="Vous avez peur des super vilains ? Nous assi ! Mais c'est fini, aujourd'hui vous pouvez appeler un super héros proche de vous!"
          property="og:description"/>
    <meta content="https://gitlab.com/HazarAZLAG/web-4-heroes" property="og:url"/>
    <!--Feuilles de style-->
    <link href="../assets/img/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="./assets/css/styles.css" rel="stylesheet"/>
</head>

<body>
<header>
    <div class="logo">
        <img src="./assets/img/logo.png" alt="">
        <p>INABETON</p>
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="./php/connexion.php">SE CONNECTER</a></li>
            <li><a class="inscrire" href="./php/sInscrire.php">S' INSCRIRE</a></li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>
<img class="bg-index" src="./assets/img/raidenbgindex.png" alt="Raiden Shogun">
<main>
    <div class="content">
        <h1>Manque d'inspiration ?</h1>
        <p>Trouvez votre bonheur en générant aléatoirement une citation</p>
        <button id="generer-btn">GÉNÉRER</button>
        <div id="citation"></div>
    </div>
    <button id="favori-btn" data-citation-id="">💜 Ajouter aux favoris</button>

</main>

<script src="./assets/js/random.js"></script>
</body>
</html>