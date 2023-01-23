<?php

require_once 'Modele/modele.php';

class Commentaire extends Modele {
    public function getCommentaires($idTicket) {
            $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
                . ' where COM_TICKET=?';
            $commentaires = $this->executerRequete($sql, array($idTicket));
            return $commentaires;
    }

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($auteur, $contenu, $idTicket) {
        $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, COM_TICKET)'
          . ' values(?, ?, ?, ?)';
        $date = date('Y-m-d h:i:s');  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idTicket));
    }
}