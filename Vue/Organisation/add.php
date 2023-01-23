<?php $this->titre = "Mon Ticketing"; ?>

<form method="post" action="organisation/addorg">
    <textarea id="txtCommentaire" name="Message_Content" rows="4" 
              placeholder="Votre message" required></textarea><br />
    <input type="hidden" name="Ticket_ID" value="<?= $ticket['Ticket_ID'] ?>" />
    <input type="submit" value="Commenter" />
</form>