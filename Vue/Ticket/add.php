<?php $this->titre = "Mon Ticketing - Nouveau Ticket"; ?>

<div class="infos">
    <h1>Création Ticket</h1>
    <div>
        <form class="ticket-form" method="post" action="ticket/add">
            <div class="">
                <select name="Organisation">
                    <?php foreach ($organisations as $organisation): ?>
                    <option value="<?php $organisation['Organisation_ID'] ?>"><?php $organisation['Organisation_Name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="">
                <input type="text" id="" name="Title" placeholder="Votre message"
                    required></textarea>
            </div>
            <div class="">
                <input type="text" id="" name="Description" placeholder="Votre message"
                    required></textarea>
            </div>
            <div class="button">
                <button type="submit" value="Commenter">
                    <i class='bx bxs-send'></i>
                </button>
            </div>
        </form>
    </div>
</div>