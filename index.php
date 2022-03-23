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
            
            
                <main>
                <div class="container-message">
                    <div class="message-div">
                        <?php include "includes/message.php"; ?>
                    </div>
                </div>
                    <div class="accueil">
        
                        <img src="images/pikachu.png" alt="pikachu">
                        <h1>Bienvenue sur le pokedex de l'ESGI !</h1>
                    </div>
                    
                </main>

            <?php include "includes/footer.php"; ?>
    </body>
</html>