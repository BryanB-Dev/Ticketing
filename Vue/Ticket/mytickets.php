<div class="table">
    <div class="search">
        <input type="text" id="search" name="" placeholder="Search...">
    </div>
    <h1>Mes Tickets</h1>
    <table class="table-sortable content-table">
        <thead>
            <tr>
                <th class="topic">ID</th>
                <th class="topic">Titre</th>
                <th class="topic">Date</th>
                <th class="topic">Organisation</th>
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
                    <?= $this->nettoyer($ticket['Organisation_Name']) ?>
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