<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Organisation.php';

class ControleurProfil extends ControleurSecurise
{
    private $organisation;

    public function __construct()
    {
        $this->organisation = new Organisation();
    }

    public function index()
    {
        $user_id = $this->requete->getSession()->getAttribut("user_id");
        $organisations = $this->organisation->getOrganisations($user_id);
        $this->genererVue(array('organisations' => $organisations));
    }

}

