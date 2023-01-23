<?php $this->titre = "Mon Ticketing"; ?>

<div class="infos organisation-index">
    <h1>Organisations</h1>
    <div class="search">
        <input type="text" id="search" name="" placeholder="Search...">
    </div>
    <table class="content-table table-sortable">
        <thead>
            <tr>
                <th class="topic">ID</th>
                <th class="topic">Nom</th>
            </tr>
        </thead>
        <tbody id="myTable">
            <?php foreach ($organisations as $organisation):?>
            <tr>
                <td>
                    <?= $this->nettoyer($organisation['Organisation_ID']) ?>
                </td>
                <td>
                    <a href="/organisation/info/<?= $this->nettoyer($organisation['Organisation_ID']) ?>">
                        <?= $this->nettoyer($organisation['Organisation_Name']) ?>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<a href="<?= " organisation/add/"?>">
    Créer une organisation
</a>

<script src="Contenu/js/sort.js"></script>