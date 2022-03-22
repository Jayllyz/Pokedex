<?php

if (isset($_GET["message"]) && !empty($_GET["message"])) {
  $message = htmlspecialchars($_GET["message"]);
  echo "<p>$message</p>";
}
?>
