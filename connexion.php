<!DOCTYPE html>
<html lang="fr">
<?php
$title = "Connexion - Inscription";
$linkCss = "css/style.css";
$linkLogoOnglet = "images/pikachu.png";
include "includes/head.php";
?>
<body>
  <?php include "includes/header.php"; ?>
    <h1><strong>Connexion</strong></h1>
    <div class="container-message">
      <div class="message-div">
        <?php include "includes/message.php"; ?>
      </div>
    </div>

    <div class="container">
        <div class="connexion">
            <h3><strong>Je possède un compte</strong></h3>
            <form action="verifications/verif_connexion.php" method="post">
                <input type="email" name="email" placeholder="Email" value="<?= isset(
                  $_COOKIE["email"]
                )
                  ? $_COOKIE["email"]
                  : "" ?>" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <input type="submit" name="submit" class="submit" value="Connexion">
            </form>
        </div>
        <div class="inscription">
        <h3><strong>Je crée un compte</strong></h3>
            <form action="verifications/verif_inscription.php" method="post" enctype="multipart/form-data">
                <input type="text" name="pseudo" placeholder="Pseudo" value="<?= isset(
                  $_COOKIE["pseudo"]
                )
                  ? $_COOKIE["pseudo"]
                  : "" ?>" required> 
                <input type="email" name="email" placeholder="Email" value="<?= isset(
                  $_COOKIE["email"]
                )
                  ? $_COOKIE["email"]
                  : "" ?>" required> 
                <input type="password" name="password" placeholder="Mot de passe" required>
                <label><strong>Image de profil: </strong>
                <input type="file" name="image" class="image" accept="image/png, image/jpeg"></label>
                <input type="submit" name="submit" class="submit" value="Inscription">
            </form>
        </div>
    </div>
    <?php include "includes/footer.php"; ?>
</body>
</html>