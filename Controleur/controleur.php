<?php

require 'Modele/modele.php';

function accueil() {
  $tickets = getTickets();
  require 'Vue/vueAccueil.php';
}

function ticket($idticket) {
  $ticket = getTicket($idticket);
  $commentaires = getCommentaires($idticket);
  require 'Vue/vueTicket.php';
}

function erreur($msgErreur) {
  require 'Vue/vueErreur.php';
}