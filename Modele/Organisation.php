<?php

require_once 'Framework/Modele.php';

class Organisation extends Modele {

    // Renvoie la liste des organisations visible par l'utilisateur
    public function getOrganisations($user_id) {
        $sql = 'SELECT '
            .   'O_NAME as Organisation_Name, O_ID as Organisation_ID '
            .   'FROM organisation AS O '
            .   'INNER JOIN whitelist AS WL ON O.O_ID = WL.WL_ORGANISATION '
            .   'INNER JOIN user AS U ON WL.WL_USER = U.U_ID '
            .   'WHERE U.U_ID = ?';
        $organisations = $this->executerRequete($sql, array($user_id));
        return $organisations;
    }

    public function getOrganisation($organisation_id) {
        $sql = 'SELECT '
            .   'O_NAME as Organisation_Name, O_ID as Organisation_ID, U_NAME as Organisation_Owner, '
            .   'count(T_ID) as Ticket_Row '
            .   'FROM organisation AS O '
            .   'INNER JOIN user AS U ON O.O_OWNER = U.U_ID '
            .   'INNER JOIN ticket AS T ON O.O_ID = T.T_ORGANISATION '
            .   'WHERE O.O_ID = ?';
        $organisation = $this->executerRequete($sql, array($organisation_id));
        if ($organisation->rowCount() > 0)
            return $organisation->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucune organisation ne correspond à l'identifiant");
    }

    public function addOrganisation($organisation_name, $owner_id) {
        $sql = 'insert into organisation(O_NAME, O_OWNER) '
            .   'values(?, ?)';
        $this->executerRequete($sql, array($organisation_name, $owner_id));
    }

}