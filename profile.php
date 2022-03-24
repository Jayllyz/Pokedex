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
    <?php
    $req = $db->query(
      "SELECT pseudo, email,image FROM user WHERE id = " . $_SESSION["id"]
    );
    $req->execute([
      "id" => $id,
    ]);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $select) { ?>
    <h1>Mon compte</h1>
    <div class="profil">
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
    <div class="profil">
        <div class="infos">
            <h2>Mes pokémons</h2>
        </div>
    </div>

    <?php include "includes/footer.php"; ?>
</body>
</html>
<?php } else {header("location: index.php");
  exit();} ?>
