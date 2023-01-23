<?php

require_once 'Modele/ticket.php';
require_once 'Modele/commentaire.php';
require_once 'Vue/vue.php';

class ControleurTicket {

    private $ticket;
    private $commentaire;

    public function __construct() {
        $this->ticket = new Ticket();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un billet
    public function ticket($idTicket) {
        $ticket = $this->ticket->getTicket($idTicket);
        $commentaires = $this->commentaire->getCommentaires($idTicket);
        $vue = new Vue("Ticket");
        $vue->generer(array('ticket' => $ticket, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idTicket) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idTicket); 
        // Actualisation de l'affichage du billet
        $this->ticket($idTicket);
    }
}