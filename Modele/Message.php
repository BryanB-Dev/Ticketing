<?php

require_once 'Framework/Modele.php';

class Message extends Modele {

// Renvoie la liste des messages associés à un ticket
    public function getMessages($Ticket_ID) {
        $sql = 'SELECT M_ID as Message_ID, M_DATE as Message_Date, '
            .   'U_ID as User_ID, U_NAME as User_Name, M_CONTENT as Message_Content FROM message AS M '
            .   'INNER JOIN user AS U ON M.M_USER = U.U_ID '
            .   'WHERE M_TICKET=? order by M_ID';
        $messages = $this->executerRequete($sql, array($Ticket_ID));
        return $messages;
    }

    public function addMessage($User_ID, $Message_Content, $Ticket_ID) {
        $sql = 'insert into message(M_DATE, M_USER, M_CONTENT, M_TICKET)'
            . ' values(?, ?, ?, ?)';
        $Date = date('Y-m-d H:i:s');
        $this->executerRequete($sql, array($Date, $User_ID, $Message_Content, $Ticket_ID));
    }
    
    public function getNombreMessage()
    {
        $sql = 'select count(*) as Message_Row from message';
        $resultat = $this->executerRequete($sql);
        $row = $resultat->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['Message_Row'];
    }
}