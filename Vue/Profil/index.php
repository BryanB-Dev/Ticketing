<?php $this->titre = "Mon Ticketing - Administration" ?>
 
<h2>Administration</h2>

Bienvenue, <?= $this->nettoyer($user_name) ?> !
<br>
<h3>Vos organisations :</h3>
<?php foreach ($organisations as $organisation):
    ?>
    <article>
        <header>
            <a href="<?= "organisation/index/" . $this->nettoyer($organisation['Organisation_ID']) ?>">
                <h3 class="titreBillet"><?= $this->nettoyer($organisation['Organisation_Name']) ?></h3>
            </a>
        </header>
    </article>
<?php endforeach; ?>

<a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a>