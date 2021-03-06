<?php
session_start();
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
include "../includes/config.php";

if (isset($_POST["submit"])) {
  if (isset($_POST["email"]) && !empty($_POST["email"])) {
    setCookie("email", $_POST["email"], time() + 24 * 3600);
  }

  if (
    empty($_POST["email"]) ||
    !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)
  ) {
    header("location: ../connexion.php?message=Email invalide !&type=danger");
    exit();
  }

  if (!isset($_POST["password"]) || empty($_POST["password"])) {
    header(
      "location: ../connexion.php?message=Mot de passe manquant !&type=danger"
    );
    exit();
  }
  $req = $db->prepare(
    "SELECT id FROM user WHERE email = :email AND password = :password"
  );
  $req->execute([
    "email" => $_POST["email"],
    "password" => hash("sha512", $_POST["password"]),
  ]);
  $reponse = $req->fetchAll(PDO::FETCH_ASSOC);
  if ($reponse) {
    foreach ($reponse as $select) {
      $_SESSION["id"] = $select["id"];
      header("location: ../index.php?message=Vous êtes connecté&type=success");
      exit();
    }
  } else {
    header(
      "location: ../connexion.php?message=Email ou mot de passe incorrect !&type=danger"
    );
    exit();
  }
}
?>
