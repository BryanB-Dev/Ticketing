<?php

require('Controleur/controleur.php');

try {
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'ticket') {
      if (isset($_GET['id'])) {
        $idticket = intval($_GET['id']);
        if ($idticket != 0)
          ticket($idticket);
        else
          throw new Exception("Identifiant de ticket non valide");
      }
      else
        throw new Exception("Identifiant de ticket non défini");
    }
    else
      throw new Exception("Action non valide");
  }
  else {
    accueil();
  }
}
catch (Exception $e) {
    erreur($e->getMessage());
}