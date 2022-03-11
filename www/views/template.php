
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>KoolPlanet</title>
        <link rel="stylesheet" href="./src/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav>
                <a href="?action=home"><h1>KoolPlanet</h1></a>
                <ul class ="container">
                    <button><a href="?action=post">Liste des sujets</a></button>
                    <?php if(!isset($_SESSION["login"])) { ?>
                        <button><a href="?action=signup">S'inscrire</a></button>
                        <button><a href="?action=login">Se connecter</a></button>
                    <?php } ?>
                    <?php if(isset($_SESSION["login"])) { ?>
                        <button><a href="?action=logout">Se déconnecter</a></button>
                    <?php } ?>
                </ul>
                <h4><?= isset($_SESSION["login"]) ? "Vous êtes connecté(e) sur le compte de " . $_SESSION["login"] . "." : ""; ?></h4>
            </nav>
        </header>
            <?= $content ?>
        <footer>
            <p>© Bosphore Braëms Forestier <?php echo date("Y"); ?></p>
        </footer>
    </body>
</html>