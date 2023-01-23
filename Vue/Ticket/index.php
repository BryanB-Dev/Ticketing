<?php $this->titre = "Mon Ticketing - " . $this->nettoyer($ticket['Ticket_Name']); ?>

<div class="infos">
    <h1>Ticket #
        <?= $this->nettoyer($ticket['Ticket_ID']) ?>
    </h1>
    <table class="content-table tickets-table">
        <thead>
            <tr>
                <th class="topic">ID</th>
                <th class="topic">Titre</th>
                <th class="topic">Description</th>
                <th class="topic">Date</th>
                <th class="topic">Groupe</th>
                <th class="topic">Statut</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?= $this->nettoyer($ticket['Ticket_ID']) ?>
                </td>
                <td>
                    <?= $this->nettoyer($ticket['Ticket_Name']) ?>
                </td>
                <td>
                    <?= $this->nettoyer($ticket['Ticket_Content']) ?>
                </td>
                <td>
                    <?= $this->nettoyer($ticket['Ticket_Date']) ?>
                </td>
                <td>
                    <?= $this->nettoyer($group['User_Group']) ?>
                </td>
                <td>
                    <?php if ($group['User_Group'] === "support"): ?>
                        <form method="post" action="ticket/statut">
                            <select name="statut">
                                <option value="0">ouvert</option>
                                <option value="1">en attente</option>
                                <option value="2">fermé</option>
                            </select>
                            <button type="submit" value="Commenter">
                                <i class='bx bx-save'></i>
                            </button>
                            <input type="hidden" name="Ticket_ID" value="<?= $this->nettoyer($ticket['Ticket_ID']) ?>"/>
                        </form>
                    <?php else: ?> 
                        <?= $this->nettoyer($ticket['Ticket_Statut']) ?>
                    <?php endif; ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="chatcontainer">
    <div class="chatbox">
        <div class="chatmessage">
            <?php foreach ($messages as $message): ?>
            <?php if ($message['User_ID'] === $user_id): ?>
            <div class="myMessage">
                <div class="user">Vous</div>
                <?php else: ?>
                <div class="message">
                    <div class="user">
                        <?= $this->nettoyer($message['User_Name']) ?>
                    </div>
                    <?php endif; ?>
                    <div class="content">
                        <?= $this->nettoyer($message['Message_Content']) ?>
                    </div>
                    <div class="date">
                        <?= $this->nettoyer($message['Message_Date']) ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div>
                <form class="chatbar" method="post" action="ticket/commenter">
                    <div class="txtCommentaire">
                        <input type="text" id="txtCommentaire" name="Message_Content" placeholder="Votre message"
                            required></textarea>
                    </div>
                    <div class="button">
                        <button type="submit" value="Commenter">
                            <i class='bx bxs-send'></i>
                        </button>
                    </div>
                    <input type="hidden" name="Ticket_ID" value="<?= $ticket['Ticket_ID'] ?>" />
                </form>
            </div>
        </div>
    </div>
    <script src="Contenu/js/chat.js"></script>