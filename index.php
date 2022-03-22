<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php
$title = "Accueil";
$linkCss = "css/style.css";
$linkLogoOnglet = "images/pikachu.png";
include "includes/head.php";
?>
    <body>
            <?php include "includes/header.php"; ?>
            <?php include "includes/message.php"; ?>
            
                <main>
                    <div class="accueil">
                        <img src="images/pikachu.png" alt="pikachu">
                        <h1>Bienvenue sur le pokedex de l'ESGI !</h1>
                    </div>
                    
                </main>

            <?php include "includes/footer.php"; ?>
    </body>
</html>