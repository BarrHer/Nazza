<?php

require_once ("modele/adherant.php");

class AdherantController {

    private $adherants;

    public function __construct() {
        $this->adherants = new adherant();
    }


}