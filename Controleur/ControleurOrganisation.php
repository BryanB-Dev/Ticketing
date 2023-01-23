<?php

require_once 'Framework/Controleur.php';
require_once 'ControleurSecurise.php';
require_once 'Modele/Organisation.php';
require_once 'Modele/Ticket.php';

class ControleurOrganisation extends ControleurSecurise {

    private $organisation;
    private $ticket;

    public function __construct() {
        $this->organisation = new Organisation();
        $this->ticket = new Ticket();
    }

    public function index() {
        $user_id = $this->requete->getSession()->getAttribut("user_id");
        $organisations = $this->organisation->getOrganisations($user_id);
        $this->genererVue(array('organisations' => $organisations));
    }

    public function info() {
        $user_id = $this->requete->getSession()->getAttribut("user_id");
        $organisation_id = $this->requete->getParametre("Ticket_ID");
        $organisation = $this->organisation->getOrganisation($organisation_id);
        $tickets = $this->ticket->getTickets($user_id, $organisation_id);
        $User_Group = $this->ticket->checkUserGroup($organisation_id, $user_id);
        $this->genererVue(array('organisation' => $organisation, 'tickets' => $tickets, 'group' => $User_Group));
    }

    public function add() {
        $this->genererVue();
    }

}

