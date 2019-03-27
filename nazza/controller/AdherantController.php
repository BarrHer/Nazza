<?php

require_once ("modele/modele.php");

class AdherantController {

    private $adherants;

    public function __construct() {
        $this->adherants = new adherant();
    }

    public function show() {
    	$adherant = "oui";
    }

}