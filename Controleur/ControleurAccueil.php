<?php

require_once 'Modele/ticket.php';
require_once 'Vue/vue.php';

class ControleurAccueil {

  private $ticket;

  public function __construct() {
    $this->ticket = new Ticket();
  }

  // Affiche la liste de tous les billets du blog
  public function accueil() {
    $tickets = $this->ticket->getTickets();
    $vue = new Vue("Accueil");
    $vue->generer(array('tickets' => $tickets));
  }
}