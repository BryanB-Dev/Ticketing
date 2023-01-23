<?php

require 'Modele.php';

try {
    $tickets = getTickets();
    require 'vueAccueil.php';
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}