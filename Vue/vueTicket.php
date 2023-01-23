<?php $titre = "Mon Ticketing - " . $ticket['titre']; ?>

<?php ob_start(); ?>
<article>
    <header>
        <h1 class="titreticket"><?= $ticket['titre'] ?></h1>
        <time><?= $ticket['date'] ?></time>
        - <?= $ticket['etat'] ?>
    </header>
    <p><?= $ticket['contenu'] ?></p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $ticket['titre'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <p><?= $commentaire['auteur'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p>
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>