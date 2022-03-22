<?php
$message = htmlspecialchars($_GET["message"]);
if (isset($_GET["message"]) && !empty($_GET["message"])) {
  echo "<p>$message</p>";
}
?>
