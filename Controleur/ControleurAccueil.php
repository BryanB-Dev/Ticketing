<?php

require_once 'Framework/Controleur.php';
require_once 'ControleurSecurise.php';
require_once 'Modele/Organisation.php';
require_once 'Modele/Ticket.php';

class ControleurAccueil extends ControleurSecurise {

    private $organisation;
    private $ticket;

    public function __construct() {
        $this->organisation = new Organisation();
        $this->ticket = new Ticket();
    }

    // Affiche la liste de tous les tickets du blog
    public function index() {
        $user_id = $this->requete->getSession()->getAttribut("user_id");
        $organisations = $this->organisation->getOrganisations($user_id);
        $this->genererVue(array('organisations' => $organisations));
    }
    
}