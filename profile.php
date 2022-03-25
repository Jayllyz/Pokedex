<?php session_start();
if (isset($_SESSION["id"])) { ?>
<!DOCTYPE html>
<html lang="fr">
<?php
$title = "Mon compte";
$linkCss = "css/style.css";
$linkLogoOnglet = "images/pikachu.png";
include "includes/head.php";
$id = $_SESSION["id"];
include "includes/config.php";
?>
<body>
<?php include "includes/header.php"; ?>
  <main>

  <?php
  $req = $db->query(
    "SELECT pseudo, email,image FROM user WHERE id = " . $_SESSION["id"]
  );
  $req->execute([
    "id" => $id,
  ]);
  $result = $req->fetchAll(PDO::FETCH_ASSOC);
  foreach ($result as $select) { ?>
    
    <div class="container-message">
      <div class="message-div">
        <?php include "includes/message.php"; ?>
      </div>
    </div>
      <div class="profil">
      <h1>Mon compte</h1>
        <div class="infos">
            <h2>Mes infos</h2>
            <p><span>Pseudo : </span><?= $select["pseudo"] ?></p>
            <p><span>Email : </span><?= $select["email"] ?></p>
        </div>
        <div class="image">

            <label>Image de profil: </label><?= '<img src="uploads/' .
              $select["image"] .
              '" class="profil-image" alt="...">' ?>

        <?php }
  ?>
        </div>

    </div>
    <hr class="separate">
    <div class="mesPokemons">
      <h2>Mes pokémons</h2>
    </div>
    
<div class="pokemons">


      
  <?php
  $req = $db->query(
    "SELECT nom, pv,image,vitesse,attaque,defense FROM pokemon WHERE id_user = " .
      $_SESSION["id"]
  );
  $resultPoke = $req->fetchAll(PDO::FETCH_ASSOC);
  foreach ($resultPoke as $selectPoke) { ?>
  <div id="fullPokemons">
    
    <div class="all_info_poke">
      <div class="info_pokemons">
      <p><strong><?= $selectPoke["nom"] ?></strong></p>
        <span>PV: <?= $selectPoke["pv"] ?></span>
        <span>Attaque: <?= $selectPoke["attaque"] ?></span>
        <span>Défense: <?= $selectPoke["defense"] ?></span>
        <span>Vitesse: <?= $selectPoke["vitesse"] ?></span>
      </div>
      <div class="imagePoke">
        <span><?= '<img src="uploadsPokemons/' .
          $selectPoke["image"] .
          '" alt="...">' ?></span>
        </div>
    </div>
  </div>
    <?php }
  ?>

</div>
  </main>
    


    <?php include "includes/footer.php"; ?>
</body>
</html>
<?php } else {header("location: index.php");
  exit();} ?>
