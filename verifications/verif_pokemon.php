<?php
session_start();
include "../includes/config.php";
if (isset($_POST["submit"])) {
  $id = htmlspecialchars($_GET["id"]);
  $nom = $_POST["nom"];
  $pv = $_POST["pv"];
  $attaque = $_POST["attaque"];
  $defense = $_POST["defense"];
  $vitesse = $_POST["vitesse"];
  if (isset($nom) && !empty($nom)) {
    setcookie("nom", $nom, time() + 3600, "/");
  } else {
    header(
      "location: ../add_pokemon.php?message=Veuillez remplir le champ nom !&type=danger"
    );
    exit();
  }
  if (isset($pv) && !empty($pv)) {
    setcookie("pv", $pv, time() + 3600, "/");
  } else {
    header(
      "location: ../add_pokemon.php?message=Veuillez remplir le champ pv !&type=danger"
    );
    exit();
  }
  if (isset($attaque) && !empty($attaque)) {
    setcookie("attaque", $attaque, time() + 3600, "/");
  } else {
    header(
      "location: ../add_pokemon.php?message=Veuillez remplir le champ attaque !&type=danger"
    );
    exit();
  }
  if (isset($defense) && !empty($defense)) {
    setcookie("defense", $defense, time() + 3600, "/");
  } else {
    header(
      "location: ../add_pokemon.php?message=Veuillez remplir le champ défense !&type=danger"
    );
    exit();
  }
  if (isset($vitesse) && !empty($vitesse)) {
    setcookie("vitesse", $vitesse, time() + 3600, "/");
  } else {
    header(
      "location: ../add_pokemon.php?message=Veuillez remplir le champ vitesse !&type=danger"
    );
    exit();
  }
  if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])) {
    // Vérifier le type de fichier
    $acceptable = ["image/jpeg", "image/png"];

    if (!in_array($_FILES["image"]["type"], $acceptable)) {
      // Rediriger vers inscription.php avec un message d'erreur
      header(
        "location: ../add_pokemon.php?message=Type de fichier incorrect.&type=danger"
      );
      exit();
    }

    $maxSize = 1 * 1024 * 1024;

    if ($_FILES["image"]["size"] > $maxSize) {
      header(
        "location: ../add_pokemon.php?message=Ce fichier est trop lourd.&type=danger"
      );
      exit();
    }

    $path = "../uploadsPokemons";

    if (!file_exists($path)) {
      mkdir($path, 0777);
    }

    $filename = $_FILES["image"]["name"];

    $array = explode(".", $filename);
    $ext = end($array);

    $filename = "image-" . time() . "." . $ext;

    $destination = $path . "/" . $filename;
    move_uploaded_file($_FILES["image"]["tmp_name"], $destination);

    include "resolution.php";
    
  } else {
    header(
      "location: ../add_pokemon.php?message=Veuillez remplir le champ image !&type=danger"
    );
    exit();
  }
  $insertPokemon = $db->prepare(
    "INSERT INTO pokemon (nom,pv,attaque,defense,vitesse,image,id_user) VALUES(:nom,:pv,:attaque,:defense,:vitesse,:image,:id_user)"
  );
  $insertPokemon->execute([
    "nom" => $nom,
    "pv" => $pv,
    "attaque" => $attaque,
    "defense" => $defense,
    "vitesse" => $vitesse,
    "image" => isset($filename) ? $filename : "",
    "id_user" => $id,
  ]);
  header(
    "location: ../profile.php?message=Votre pokémon a bien été ajouté !&type=success"
  );
  exit();
}
?>
