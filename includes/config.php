<?php
$username = DB_USER;
$password = DB_PASSWORD;
try {
  $db = new PDO(
    "mysql:host=localhost:8889;dbname=pokedex",
    $username,
    $password,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
} catch (PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}
?>
