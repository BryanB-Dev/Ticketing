<?php

require_once 'Modele/modele.php';

class Ticket extends Modele {

    // Renvoie la liste des tickets
    public function getTickets() {
        $sql = 'select TICKET_ID as id, TICKET_DATE as date,'
            . ' TICKET_TITRE as titre, TICKET_CONTENU as contenu, ETAT_LIB as etat from T_TICKET'
            . ' INNER JOIN T_ETAT ON TICKET_ETAT = T_ETAT.ETAT_CODE'
            . ' order by TICKET_ID desc';
        $tickets = $this->executerRequete($sql);
        return  $tickets;
    }
    
    // Renvoie les informations sur un ticket
    public function getTicket($idTicket) {
        $sql = 'select TICKET_ID as id, TICKET_DATE as date,'
            . ' TICKET_TITRE as titre, TICKET_CONTENU as contenu, ETAT_LIB as etat from T_TICKET'
            . ' INNER JOIN T_ETAT ON TICKET_ETAT = T_ETAT.ETAT_CODE'
            . ' where TICKET_ID=?';
        $ticket = $this->executerRequete($sql, array($idTicket));
        if ($ticket->rowCount() > 0)
            return $ticket->fetch();
        else
            throw new Exception("Aucun ticket ne correspond à l'identifiant '$idTicket'");
    }
}