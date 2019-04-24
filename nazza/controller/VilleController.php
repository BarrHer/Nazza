<?php

require_once ("modele/modeleVille.php");

class VilleController {

    private $villes;

    public function __construct() {
        $this->villes = new ville();
    }


}