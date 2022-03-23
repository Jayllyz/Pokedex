<?php

if (isset($_GET["message"]) && !empty($_GET["message"])) {
  if (isset($_GET["type"]) && !empty($_GET["type"])) {
    $type = htmlspecialchars($_GET["type"]);
    $message = htmlspecialchars($_GET["message"]);
    echo "<p class='message-text $type'>$message</p>";
  }
}
?>
