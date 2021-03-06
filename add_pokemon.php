<?php session_start();
if (isset($_SESSION["id"])) {
  $id = $_SESSION["id"]; ?>

<!DOCTYPE html>
<html lang="fr">
<?php
$title = "Ajouter un pokémon";
$linkCss = "css/style.css";
$linkLogoOnglet = "images/pikachu.png";
include "includes/head.php";
?>
<body>
<?php include "includes/header.php"; ?>
    <h1>Ajouter un pokemon</h1>
    <div class="container-message">
      <div class="message-div">
        <?php include "includes/message.php"; ?>
      </div>
    </div>
    <div class="add_pokemon">
        <form action="verifications/verif_pokemon.php?id=<?= $id ?>" id="add_pokemon" method="post" enctype="multipart/form-data">
            <input type="text" name="nom" placeholder="Nom" value="<?= isset(
              $_COOKIE["nom"]
            )
              ? $_COOKIE["nom"]
              : "" ?>" required>
            <input type="number" name="pv" placeholder="PV" value="<?= isset(
              $_COOKIE["pv"]
            )
              ? $_COOKIE["pv"]
              : "" ?>" required>
            <input type="number" name="attaque" placeholder="Attaque" value="<?= isset(
              $_COOKIE["attaque"]
            )
              ? $_COOKIE["attaque"]
              : "" ?>" required>
            <input type="number" name="defense" placeholder="Défense" value="<?= isset(
              $_COOKIE["defense"]
            )
              ? $_COOKIE["defense"]
              : "" ?>" required>
            <input type="number" name="vitesse" placeholder="Vitesse" value="<?= isset(
              $_COOKIE["vitesse"]
            )
              ? $_COOKIE["vitesse"]
              : "" ?>" required>
            <div class="image_pokemon_div">
                <label class="image_pokemon"><strong>Image:</strong> 
                <input type="file" name="image" class="image" accept="image/png, image/jpeg" required></label>
            </div>

            <input type="submit" class="submit" value="Ajouter" name="submit">
        </form>
    </div>
    


<?php include "includes/footer.php"; ?>
</body>
</html>
<?php
} else {
  header("location: index.php");
  exit();
} ?>
