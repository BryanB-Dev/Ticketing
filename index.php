<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Mon Ticketing</title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">Mon Ticketing</h1></a>
                <p>Je vous souhaite la bienvenue sur ce modeste ticketing.</p>
            </header>
            <div id="contenu">
                <?php
                $bdd = new PDO('mysql:host=localhost;dbname=ticketing;charset=utf8',
                        'root', '');
                $tickets = $bdd->query('select TICKET_ID as id, TICKET_DATE as date,'
                        . ' TICKET_TITRE as titre, TICKET_CONTENU as contenu from T_TICKET'
                        . ' order by TICKET_ID desc');
                foreach ($tickets as $ticket):
                    ?>
                    <article>
                        <header>
                            <h1 class="titreBillet"><?= $ticket['titre'] ?></h1>
                            <time><?= $ticket['date'] ?></time>
                        </header>
                        <p><?= $ticket['contenu'] ?></p>
                    </article>
                    <hr />
                <?php endforeach; ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Ticketing réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>