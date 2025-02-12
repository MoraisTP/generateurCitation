<!DOCTYPE html>
<html lang="en">
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
    <link href="../assets/css/styles.css" rel="stylesheet"/>
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
    <source src="/assets/vid/bg.mp4" type="video/mp4">
</video>
<section class="fav-item">
<h2>Mes citations favorites</h2>
<ul id="favoris-list"></ul>
</section>
<script src="/assets/js/random.js"></script>
<script src="/assets/js/favoris.js"></script>
</body>
</html>