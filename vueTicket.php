<?php $titre = "Mon Ticketing - " . $ticket['titre']; ?>

<?php ob_start(); ?>
<article>
    <header>
        <h1 class="titreBillet"><?= $ticket['titre'] ?></h1>
        <time><?= $ticket['date'] ?></time>
    </header>
    <p><?= $ticket['contenu'] ?></p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $ticket['titre'] ?></h1>
</header>
<?php foreach ($messages as $message): ?>
    <p><?= $message['auteur'] ?> dit :</p>
    <p><?= $message['contenu'] ?></p>
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>