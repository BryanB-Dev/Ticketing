<?php

require_once 'Framework/Modele.php';

class Utilisateur extends Modele {

    public function connecter($user_email, $user_password)
    {
        $sql = "select U_ID from user where U_EMAIL=? and U_PASSWORD=?";
        $utilisateur = $this->executerRequete($sql, array($user_email, $user_password));
        return ($utilisateur->rowCount() == 1);
    }

    public function getUtilisateur($user_email, $user_password)
    {
        $sql = "select U_ID as user_id, U_EMAIL as user_email, U_PASSWORD as user_password , U_NAME as user_name 
            from user where U_EMAIL=? and U_PASSWORD=?";
        $utilisateur = $this->executerRequete($sql, array($user_email, $user_password));
        if ($utilisateur->rowCount() == 1)
            return $utilisateur->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
    }

}

