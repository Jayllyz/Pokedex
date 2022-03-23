<header>
    <nav class="header">
        <a href="index.php"><img src="images/logo.png" height="40"></a>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="collection.php">Collection</a></li>
            <?php if (!isset($_SESSION["id"])) { ?>
            <li><a href="connexion.php">Connexion</a></li>
            <?php } else { ?>
            <li><a href="add_pokemon.php">Ajouter un pokemon</a></li>
            <li><a href="profile.php">Mon compte</a></li>
            <li><a href="deconnexion.php">Deconnexion</a></li>
            <?php } ?>
        </ul>
</nav>

</header>