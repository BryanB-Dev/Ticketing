<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Infos -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
        <base href="<?= $racineWeb ?>">
        <title><?= $titre ?></title>
        <meta name="description" content="Voici mon ticketing"> 
        <meta name="author" content="Bryan">
        
        <!-- Open Graph -->
        <meta property="og:title" content="ticketing"> 
        <meta property="og:description" content="Voici mon ticketing"> 
        <meta property="og:type" content="website"> 
        <meta property="og:url" content="http://127.0.0.2"> 
        <meta property="og:image" content="">

        <!-- Style -->
        <link href="Contenu/css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

        <!-- Script -->
	    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script defer src="Contenu/js/script.js"></script>
        <script defer src="Contenu/js/nav.js"></script>
    </head>
    <body>
        <?= require_once('Vue/nav.php') ?>
        <div class="home-section">
            <?= $contenu ?>
        </div>
    </body>
</html>