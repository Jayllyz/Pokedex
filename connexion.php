<!DOCTYPE html>
<html lang="fr">
<?php
$title = "Connexion - Inscription";
$linkCss = "css/style.css";
$linkLogoOnglet = "images/pikachu.png";
include "includes/head.php";
?>
<body>
    <div class="container">
        <div class="connexion">
            <h3><strong>Je posède un compte</strong></h3>
            <form action="" method="post">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <input type="submit" value="Connexion">
            </form>
        </div>
        <div class="inscription">
        <h3><strong>Je crée un compte</strong></h3>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="pseudo" placeholder="Pseudo" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <label><strong>Image</strong></label>
                <input type="file" name="image" accept="image/png, image/jpeg">
                <input type="submit" value="Inscription">
            </form>
        </div>
    </div>
</body>
</html>