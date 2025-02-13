<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();}
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === TRUE) {
    ?>
    <header>
        <div class='logo'>
            <a href="/index.php"><img src='/assets/img/logo.png' alt=''></a>
            <p>INABETON</p>
        </div>
        <nav>
            <ul class='nav-links'>
                <li><a href="/php/favoris.php" style="background-color: transparent;"><img src="/assets/img/userIcon.png" style="width: 70px;" alt="chepo"></a></li>
                <li><a href="/php/deconnexion.php">SE DÉCONNECTER</a></li>
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
    // Utilisateur non connecté
    ?>
    <header>
        <div class='logo'>
            <a href="/index.php"><img src='/assets/img/logo.png' alt=''></a>
            <p>INABETON</p>
        </div>
        <nav>
            <ul class='nav-links'>
                <li><a href='/php/connexion.php'>SE CONNECTER</a></li>
                <li><a class='inscrire' href='/php/sInscrire.php'>S' INSCRIRE</a></li>
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