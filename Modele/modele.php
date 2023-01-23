<?php
// Renvoie la liste des tickets
function getTickets() {
    $bdd = getBdd();
    $tickets = $bdd->query('select TICKET_ID as id, TICKET_DATE as date,'
        . ' TICKET_TITRE as titre, TICKET_CONTENU as contenu, ETAT_LIB as etat from T_TICKET'
        . ' INNER JOIN T_ETAT ON TICKET_ETAT = T_ETAT.ETAT_CODE'
        . ' order by TICKET_ID desc'
    );
    return  $tickets;
}

// Renvoie les informations sur un ticket
function getTicket($idticket) {
    $bdd = getBdd();
    $ticket = $bdd->prepare('select TICKET_ID as id, TICKET_DATE as date,'
        . ' TICKET_TITRE as titre, TICKET_CONTENU as contenu, ETAT_LIB as etat from T_TICKET'
        . ' INNER JOIN T_ETAT ON TICKET_ETAT = T_ETAT.ETAT_CODE'
        . ' where TICKET_ID=?');
    $ticket->execute(array($idticket));
    if ($ticket->rowCount() > 0)
        return $ticket->fetch();
    else
        throw new Exception("Aucun ticket ne correspond à l'identifiant '$idticket'");
}

// Renvoie la liste des commentaires associés à un ticket
function getCommentaires($idticket) {
    $bdd = getBdd();
    $commentaires = $bdd->prepare('select COM_ID as id, COM_DATE as date,'
        . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
        . ' where TICKET_ID=?');
    $commentaires->execute(array($idticket));
    return $commentaires;
}

function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=ticketing;charset=utf8', 'root',
        '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}