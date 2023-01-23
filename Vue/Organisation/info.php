<?php $this->titre = "Mon Ticketing"; ?>

<div class="infos">
    <h1>Organisation</h1>
    <table class="content-table infos-table">
        <thead>
            <tr>
                <th class="topic">ID</th>
                <th class="topic">Nom</th>
                <th class="topic">Owner</th>
                <th class="topic">Tickets</th>
                <th class="topic">Groupe</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?= $this->nettoyer($organisation['Organisation_ID']) ?>
                </td>
                <td>
                    <?= $this->nettoyer($organisation['Organisation_Name']) ?>
                </td>
                <td>
                    <?= $this->nettoyer($organisation['Organisation_Owner']) ?>
                </td>
                <td>
                    <?= $this->nettoyer($organisation['Ticket_Row']) ?>
                </td>
                <td>
                    <?= $this->nettoyer($group['User_Group']) ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="table">
    <div class="search">
        <input type="text" id="search" name="" placeholder="Search...">
        <a href="ticket/add" id="add">
            <i class='bx bx-plus'></i>
            New
        </a>
    </div>
    <h1>Tickets</h1>
    <table class="table-sortable content-table">
        <thead>
            <tr>
                <th class="topic">ID</th>
                <th class="topic">Titre</th>
                <th class="topic">Date</th>
                <th class="topic">Ouvert par</th>
                <th class="topic">Statut</th>
            </tr>
        </thead>
        <tbody id="myTable">
            <?php foreach ($tickets as $ticket):?>
            <tr>
                <td>
                    <?= $this->nettoyer($ticket['Ticket_ID']) ?>
                </td>
                <td>
                    <a href="/ticket/index/<?= $this->nettoyer($ticket['Ticket_ID']) ?>">
                        <?= $this->nettoyer($ticket['Ticket_Name']) ?>
                    </a>
                </td>
                <td>
                    <?= $this->nettoyer($ticket['Ticket_Date']) ?>
                </td>
                <td>
                    <?= $this->nettoyer($ticket['User_Name']) ?>
                </td>
                <td>
                    <?= $this->nettoyer($ticket['Ticket_Statut']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="Contenu/js/sort.js"></script>