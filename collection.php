<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<?php
$title = "Collection";
$linkCss = "css/style.css";
$linkLogoOnglet = "images/pikachu.png";
include "includes/head.php";
include "includes/config.php";
?>
<body>
    <?php include "includes/header.php"; ?>
    <main>
        <h1>TOUS LES POKEMONS</h1>
        <div class="pokemons">
        <?php
        $req = $db->query(
          "SELECT nom, pv,image,vitesse,attaque,defense FROM pokemon "
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
                      '" alt="' . $selectPoke["nom"] . '">' ?></span>
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

