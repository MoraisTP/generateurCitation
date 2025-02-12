<?php
session_start();
if (isset($_SESSION["loggedin"]) && ($_SESSION["loggedin"] == TRUE)) {
    ?>
    <header>
        <div class='logo'>
            <img src='./assets/img/logo.png' alt=''>
            <p>INABETON</p>
        </div>
        <nav>
            <ul class='nav-links'>
                <li><a href="../php/connexion.php">SE CONNECTER</a></li>
                <li><a class='inscrire' href='./php/sInscrire.php'>S' INSCRIRE</a></li>
            </ul>
            <div class='burger'>
                <div class='line1'></div>
                <div class='line2'></div>
                <div class='line3'></div>
            </div>
        </nav>
    </header>
    <?php
} else {
    //write another nav menu html code here
    ?>


    <header>
        <div class='logo'>
            <img src='../assets/img/logo.png' alt=''>
            <p>INABETON</p>
        </div>
        <nav>
            <ul class='nav-links'>
                <li><a href='./connexion.php'>SE CONNECTER</a></li>
                <li><a class='inscrire' href='./sInscrire.php'>S' INSCRIRE</a></li>
            </ul>
            <div class='burger'>
                <div class='line1'></div>
                <div class='line2'></div>
                <div class='line3'></div>
            </div>
        </nav>
    </header>
    <?php
}
?>