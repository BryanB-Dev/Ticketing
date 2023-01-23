<?php

require 'Modele.php';

try {
    if (isset($_GET['id'])) {
        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $id = intval($_GET['id']);
        if ($id != 0) {
            $ticket = getTicket($id);
            $messages = getMessages($id);
            require 'vueTicket.php';
        }
        else
            throw new Exception("Identifiant de ticket incorrect");
    }
    else
        throw new Exception("Aucun identifiant de ticket");
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}