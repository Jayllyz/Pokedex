<?php
$username = "root";
$password = "root";
try {
  $db = new PDO(
    "mysql:host=localhost:3306;dbname=devweb",
    $username,
    $password,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
} catch (PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}
?>
