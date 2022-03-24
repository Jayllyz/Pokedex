<?php $active = "active"; ?>

<header>
    <nav class="header">
        <a href="index.php"><img src="images/logo.png" height="40"></a>
        <ul>
            <li><a href="index.php" class="<?= $title == "Accueil"
              ? $active
              : "" ?>">Accueil</a></li>
            <li><a href="collection.php" class="<?= $title == "Collection"
              ? $active
              : "" ?>">Collection</a></li>
            <?php if (!isset($_SESSION["id"])) { ?>
            <li><a href="connexion.php" class="<?= $title ==
            "Connexion - Inscription"
              ? $active
              : "" ?>">Connexion</a></li>
            <?php } else { ?>
            <li><a href="add_pokemon.php" class="<?= $title ==
            "Ajouter un pokémon"
              ? $active
              : "" ?>">Ajouter un pokemon</a></li>
            <li><a href="profile.php" class="<?= $title == "Mon compte"
              ? $active
              : "" ?>">Mon compte</a></li>
            <li><a href="deconnexion.php">Deconnexion</a></li>
            <?php } ?>
        </ul>
</nav>

</header>