<?php session_start(); ?>
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
    <h1 class="profil">Mon compte</h1>
    <?= '<img src="uploads/' .
      $select["image"] .
      '" class="profil-image" alt="...">' ?>

<?php }
    ?>
    <?php include "includes/footer.php"; ?>
</body>
</html>