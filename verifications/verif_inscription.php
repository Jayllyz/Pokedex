<?php
session_start();
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
include "../includes/config.php";
if (isset($_POST["submit"])) {
  $minuscule = preg_match("/[a-z]+/", $_POST["password"]);
  $majuscule = preg_match("/[A-Z]+/", $_POST["password"]);
  $chiffre = preg_match("/[0-9]+/", $_POST["password"]);

  if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    header("location: ../connexion.php?message=Email invalide !&type=danger");
    exit();
  } else {
    setcookie("email", $_POST["email"], time() + 3600, "/");
  }
  // Verifier si le pseudo n'est pas déja utiliser

  $req = $db->prepare("SELECT id FROM user WHERE pseudo = :pseudo");
  $req->execute([
    "pseudo" => $_POST["pseudo"],
  ]);
  // Recupérer la première ligne de résultat
  $reponse = $req->fetch(); // Renvoie la première ligne sous forme de tableau ou une valeur booléenne FALSE
  // Si la ligne existe : erreur, le pseudo est déja utilisé
  if ($reponse) {
    header(
      "location: ../connexion.php?message=Ce pseudo est déjà utilisé !&type=danger"
    );
    exit();
  } else {
    setcookie("pseudo", $_POST["pseudo"], time() + 3600, "/");
  }
  $req = $db->prepare("SELECT id FROM user WHERE email = :email");
  $req->execute([
    "email" => $_POST["email"],
  ]);
  // Recupérer la première ligne de résultat
  $reponse = $req->fetch(); // Renvoie la première ligne sous forme de tableau ou une valeur booléenne FALSE
  // Si la ligne existe : erreur, le pseudo est déja utilisé
  if ($reponse) {
    header(
      "location: ../connexion.php?message=Cet email est déjà utilisé !&type=danger"
    );
    exit();
  } else {
    setcookie("email", $_POST["email"], time() + 3600, "/");
  }

  if (strlen($_POST["password"]) < 8) {
    header(
      "location: ../connexion.php?message=Mot de passe invalide. Il doit faire au moins 8 caractères !&type=danger"
    );
    exit();
  }

  if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])) {
    // Vérifier le type de fichier
    $acceptable = ["image/jpeg", "image/png"];

    if (!in_array($_FILES["image"]["type"], $acceptable)) {
      // Rediriger vers inscription.php avec un message d'erreur
      header(
        "location: ../connexion.php?message=Type de fichier incorrect.&type=danger"
      );
      exit();
    }

    $maxSize = 1 * 1024 * 1024;

    if ($_FILES["image"]["size"] > $maxSize) {
      header(
        "location: ../connexion.php?message=Ce fichier est trop lourd.&type=danger"
      );
      exit();
    }

    $path = "../uploads";

    if (!file_exists($path)) {
      mkdir($path, 0777);
    }

    $filename = $_FILES["image"]["name"];

    $array = explode(".", $filename);
    $ext = end($array);

    $filename = "image-" . time() . "." . $ext;

    $destination = $path . "/" . $filename;
    move_uploaded_file($_FILES["image"]["tmp_name"], $destination);
  }
  if (
    !empty($_POST["pseudo"]) &&
    !empty($_POST["email"]) &&
    !empty($_POST["password"])
  ) {
    if ($minuscule == 1 && $majuscule == 1 && $chiffre == 1) {
      $req = $db->prepare(
        "INSERT INTO user (pseudo,email,password,image) VALUES (:pseudo,:email,:password,:image)"
      );
      $email = $_POST["email"];
      $pseudo = $_POST["pseudo"];
      $password = $_POST["password"];

      $req->execute([
        "pseudo" => $pseudo,
        "email" => $email,
        "password" => hash("sha512", $password),
        "image" => isset($filename) ? $filename : "",
      ]);
      header(
        "location: ../index.php?message=Inscription réussi !&type=success"
      );
      exit();
    } else {
      header(
        "location: ../connexion.php?message=Le mot de passe doit contenir au minimum une majuscule, une minuscule et un chiffre.&type=danger"
      );
      exit();
    }
  } else {
    header(
      "location: ../connexion.php?message=Les champs ne sont pas tous remplis !&type=danger"
    );
    exit();
  }
}

?>
