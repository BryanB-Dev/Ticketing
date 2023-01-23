<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="../index.php"><h1 id="titreTicketing">Ticketing</h1></a>
                <p>Je vous souhaite la bienvenue sur mon ticketing.</p>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div>
            <footer id="piedTicketing">
                Ticketing réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div>
    </body>
</html>