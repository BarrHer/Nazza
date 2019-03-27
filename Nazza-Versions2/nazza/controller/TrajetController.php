<?php

require_once ("modele/modeleTrajet.php");

class TrajetController {

    private $trajets;

    public function __construct() {
        $this->trajets = new trajet();
    }


}