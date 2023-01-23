<?php 
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurTicket.php';
require_once 'Vue/vue.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlTicket;

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlTicket = new ControleurTicket();
  }

  // Traite une requête entrante
  public function routerRequete() {
    try {
      if (isset($_GET['action'])) {
        if ($_GET['action'] == 'ticket') {
          if (isset($_GET['id'])) {
            $idTicket = intval($_GET['id']);
            if ($idTicket != 0) {
              $this->ctrlTicket->ticket($idTicket);
            }
            else
              throw new Exception("Identifiant de ticket non valide");
          }
          else
            throw new Exception("Identifiant de ticket non défini");
        }
        else if ($_GET['action'] == 'commenter') {
          $auteur = $this->getParametre($_POST, 'auteur');
          $contenu = $this->getParametre($_POST, 'contenu');
          $idTicket = $this->getParametre($_POST, 'id');
          $this->ctrlTicket->commenter($auteur, $contenu, $idTicket);
        }
        else
          throw new Exception("Action non valide");
      }
      else {  // aucune action définie : affichage de l'accueil
        $this->ctrlAccueil->accueil();
      }
    }
    catch (Exception $e) {
      $this->erreur($e->getMessage());
    }
  }

  // Recherche un paramètre dans un tableau
  private function getParametre($tableau, $nom) {
    if (isset($tableau[$nom])) {
      return $tableau[$nom];
    }
    else
      throw new Exception("Paramètre '$nom' absent");
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
}