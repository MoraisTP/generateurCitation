<!DOCTYPE html>
<html lang="en">
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
    <source src="/assets/vid/bg.mp4" type="video/mp4">
</video>
<!--Section favoris-->
<section class="fav-item">
<h2>Mes citations favorites</h2>
<ul id="favoris-list"></ul>
</section>
<script src="/assets/js/random.js"></script>
<script src="/assets/js/favoris.js"></script>
</body>
</html>