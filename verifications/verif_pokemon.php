<?php
session_start();
$id = htmlspecialchars($_GET["id"]);
$nom = $_POST["nom"];
$pv = $_POST["pv"];
$attaque = $_POST["attaque"];
$defense = $_POST["defense"];
$vitesse = $_POST["vitesse"];
?>
