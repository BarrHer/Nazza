<?php

require_once ("modele/modele.php");

class AdherantControlleur {

    private $adherant;

    public function __construct() {
        $this->adherant = new adherant();
    }

    public function index() {
        $data['test'] = $this->adherant->getTest();
    }

}