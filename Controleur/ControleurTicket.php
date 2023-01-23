<?php

require_once 'Framework/Controleur.php';
require_once 'ControleurSecurise.php';
require_once 'Modele/Ticket.php';
require_once 'Modele/Message.php';

class ControleurTicket extends ControleurSecurise {

    private $ticket;
    private $message;

    /**
     * Constructeur 
     */
    public function __construct() {
        $this->ticket = new Ticket();
        $this->message = new Message();
    }

    // Affiche les détails sur un ticket
    public function index() {
        $Ticket_ID = $this->requete->getParametre("Ticket_ID");
        $User_ID = $this->requete->getSession()->getAttribut("user_id");
        $Access = $this->ticket->checkTicketAccess($Ticket_ID, $User_ID);
        $ticket = $this->ticket->getTicket($Ticket_ID);
        $messages = $this->message->getMessages($Ticket_ID);
        $User_Group = $this->ticket->checkUserGroup($ticket['Organisation_ID'], $User_ID);

        if ($Access || ($User_Group['User_Group'] == "support")) 
            $this->genererVue(array('ticket' => $ticket, 'messages' => $messages, 'group' => $User_Group, 'user_id' => $User_ID ));
        else
            throw new Exception("Vous n'avez pas accès à ce ticket"); 
    }

    // Ajoute un message sur un ticket
    public function commenter() {
        $Ticket_ID = $this->requete->getParametre("Ticket_ID");
        $User_ID = $this->requete->getSession()->getAttribut("user_id");
        $Message_Content = $this->requete->getParametre("Message_Content");
        if (trim($Message_Content) != '') 
            $this->message->addMessage($User_ID, $Message_Content, $Ticket_ID);
            $this->rediriger("ticket/index/" . $Ticket_ID);
    }

    // Change le statut d'un ticket
    public function statut() {
        $Ticket_ID = $this->requete->getParametre("Ticket_ID");
        $Statut = $this->requete->getParametre("statut");
        $this->ticket->updateStatut($Ticket_ID, $Statut);
        $this->rediriger("ticket/index/" . $Ticket_ID);
    }

    // Affiche les tickets ouverts par l'utilisateur
    public function mytickets() {
        $User_ID = $this->requete->getSession()->getAttribut("user_id");
        $tickets = $this->ticket->getMyTickets($User_ID);
        $this->genererVue(array('tickets' => $tickets));
    }

    // Vue ajout ticket
    public function add() {
        $user_id = $this->requete->getSession()->getAttribut("user_id");
        $organisations = $this->organisation->getOrganisations($user_id);
        $this->genererVue(array('organisations' => $organisations));
    }

    // Ajout d'un ticket
    public function addTicket() {
        $Organisation_id = $this->requete->getParametre("Organisation");
        $User_ID = $this->requete->getSession()->getAttribut("user_id");
        $Title = $this->requete->getParametre("Title");
        $Description = $this->requete->getParametre("Description");
    }
}