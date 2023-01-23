<?php

// Renvoie la liste des tickets
function getTickets() {
    $bdd = getBdd();
    $tickets = $bdd->query('select TICKET_ID as id, TICKET_DATE as date,'
            . ' TICKET_TITRE as titre, TICKET_CONTENU as contenu from T_TICKET'
            . ' order by TICKET_ID desc');
    return $tickets;
}

// Renvoie les informations sur un Ticket
function getTicket($idTicket) {
    $bdd = getBdd();
    $ticket = $bdd->prepare('select TICKET_ID as id, TICKET_DATE as date,'
            . ' TICKET_TITRE as titre, TICKET_CONTENU as contenu from T_TICKET'
            . ' where TICKET_ID=?');
    $ticket->execute(array($idTicket));
    if ($ticket->rowCount() > 0)
        return $ticket->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun ticket ne correspond à l'identifiant '$idTicket'");
}

// Renvoie la liste des messages associés à un ticket
function getMessages($idTicket) {
    $bdd = getBdd();
    $messages = $bdd->prepare('select MESSAGE_ID as id, MESSAGE_DATE as date,'
            . ' MESSAGE_AUTEUR as auteur, MESSAGE_CONTENU as contenu from T_MESSAGE'
            . ' where TICKET_ID=?');
    $messages->execute(array($idTicket));
    return $messages;
}

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=ticketing;charset=utf8', 'root',
            '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}