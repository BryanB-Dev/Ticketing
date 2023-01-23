<?php $titre = 'Mon Ticketing'; ?>

<?php ob_start(); ?>
<?php foreach ($tickets as $ticket): ?>
    <article>
        <header>
            <a href="<?= "index.php?action=ticket&id=" . $ticket['id'] ?>">
                <h1 class="titreticket"><?= $ticket['titre'] ?></h1>
            </a>
            <time><?= $ticket['date'] ?></time>
            - <?= $ticket['etat'] ?>
        </header>
        <p><?= $ticket['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>