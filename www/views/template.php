<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>KoolPlanet</title>
        <link rel="stylesheet" href="./src/style.css">
    </head>
    <body>
        <header>
            <nav>
                <a class="header__hero--unstyled" href="?action=home"><h1>KoolPlanet</h1></a>
                <ul>
                    <li><a href="?action=login">Se connecter</a></li>
                    <li><a href="?action=signup">S'inscrire</a></li>
                    <li><a href="">Se déconnecter</a></li>
                </ul>
                <h5 class="header__info--login"><?= $data["login_message"] ?></h5>
            </nav>
        </header>
            <?= $content ?>
        <footer>
            <p>© Bosphore Braëms Forestier <?php echo date("Y"); ?></p>
        </footer>
    </body>
</html>