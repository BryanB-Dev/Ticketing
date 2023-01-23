<?php

require_once 'Framework/Modele.php';

class Ticket extends Modele {

    // Renvoie les informations sur un ticket
    public function getTicket($ticket_id) {
        $sql = 'SELECT '
            .   'T_NAME as Ticket_Name, T_CONTENT as Ticket_Content, T_DATE as Ticket_Date, T_ID as Ticket_ID, '
            .   'S_LIB as Ticket_Statut, '
            .   'O_NAME as Organisation_Name, O_ID as Organisation_ID, '
            .   'U_NAME as User_Name '
            .   'FROM ticket AS T '
            .   'INNER JOIN statut AS S ON T.T_STATUT = S.S_ID '
            .   'INNER JOIN organisation AS O ON T.T_ORGANISATION = O.O_ID '
            .   'INNER JOIN whitelist AS WL ON O.O_ID = WL.WL_ORGANISATION '
            .   'INNER JOIN user AS U ON WL.WL_USER = U.U_ID '
            .   'WHERE T.T_ID = ?';
        $ticket = $this->executerRequete($sql, array($ticket_id));
        if ($ticket->rowCount() > 0)
            return $ticket->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun ticket ne correspond à l'identifiant '$ticket_id'");
    }

    // Renvoie la liste des tickets visible par l'utilisateur
    public function getTickets($user_id, $organisation_id) {
        $sql = 'SELECT '
            .   'T_NAME as Ticket_Name, T_CONTENT as Ticket_Content, T_DATE as Ticket_Date, T_ID as Ticket_ID, '
            .   'S_LIB as Ticket_Statut, '
            .   'O_NAME as Organisation_Name, '
            .   'U_NAME as User_Name '
            .   'FROM ticket AS T '
            .   'INNER JOIN statut AS S ON T.T_STATUT = S.S_ID '
            .   'INNER JOIN organisation AS O ON T.T_ORGANISATION = O.O_ID '
            .   'INNER JOIN whitelist AS WL ON O.O_ID = WL.WL_ORGANISATION '
            .   'INNER JOIN user AS U ON WL.WL_USER = U.U_ID '
            .   'WHERE U.U_ID = ? AND O.O_ID = ? order by T_DATE desc';
        $tickets = $this->executerRequete($sql, array($user_id, $organisation_id));
        return $tickets;
    }

    // Vérifier si l'utilisateur à accès au ticket (wl + non fermé)
    public function checkTicketAccess($ticket_id, $user_id) {
        $sql = 'SELECT '
            .   'count(*) as row '
            .   'FROM ticket AS T '
            .   'INNER JOIN statut AS S ON T.T_STATUT = S.S_ID '
            .   'INNER JOIN organisation AS O ON T.T_ORGANISATION = O.O_ID '
            .   'INNER JOIN whitelist AS WL ON O.O_ID = WL.WL_ORGANISATION '
            .   'INNER JOIN user AS U ON WL.WL_USER = U.U_ID '
            .   'WHERE T.T_ID = ? AND U.U_ID = ? AND T.T_STATUT < 2';
        $ticket = $this->executerRequete($sql, array($ticket_id, $user_id));
        $row = $ticket->fetch(); 
        return ($row['row'] > 0);
    }

    // Change le statut d'un ticket
    public function updateStatut($Ticket_ID, $Statut) {
        $sql = 'UPDATE ticket '
            .   'SET T_STATUT = ? '
            .   'WHERE T_ID = ?';
        $ticket = $this->executerRequete($sql, array($Statut, $Ticket_ID));
    }

    // Renvoie le groupe de l'utilisateur en fonction de l'organisation
    public function checkUserGroup($organisation_id, $user_id) {
        $sql = 'SELECT G_LIB as User_Group '
            .   'FROM organisation AS O '
            .   'INNER JOIN whitelist AS WL ON O.O_ID = WL.WL_ORGANISATION '
            .   'INNER JOIN user AS U ON WL.WL_USER = U.U_ID '
            .   'INNER JOIN `group` AS G ON WL.WL_USER_GROUP = G.G_ID '
            .   'WHERE O.O_ID = ? AND U.U_ID = ? ';
        $group = $this->executerRequete($sql, array($organisation_id, $user_id));
        return $group->fetch();  // Accès à la première ligne de résultat
    }

    public function getMyTickets($user_id) {
        $sql = 'SELECT '
            .   'T_NAME as Ticket_Name, T_DATE as Ticket_Date, T_ID as Ticket_ID, '
            .   'S_LIB as Ticket_Statut, '
            .   'O_NAME as Organisation_Name '
            .   'FROM ticket AS T '
            .   'INNER JOIN statut AS S ON T.T_STATUT = S.S_ID '
            .   'INNER JOIN organisation AS O ON T.T_ORGANISATION = O.O_ID '
            .   'WHERE T.T_USER = ? order by T_DATE desc';
        $tickets = $this->executerRequete($sql, array($user_id));
        return $tickets;
    }

    public function addTicket($organisation_id, $user_id, $title, $description) {
        $sql = 'insert into ticket(T_ORGANISATION, T_USER, T_NAME, T_CONTENT, T_DATE, T_STATUT)'
            . ' values(?, ?, ?, ?, ?, ?)';
        $Date = date('Y-m-d H:i:s');
        $this->executerRequete($sql, array($organisation_id, $user_id, $title, $description, $Date, 0));
    }
}