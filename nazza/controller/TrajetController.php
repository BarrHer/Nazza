<?php

require_once ("modele/modeleTrajet.php");

class TrajetController {

    private $trajets;

    public function __construct() {
        $this->trajets = new trajet();
    }

    public function add() {
        $errors = array();
        if (isset($_POST['submit'])) {
            if (empty($_POST['inputAddress'])) {
                $errors['inputAddress'] = 'a';
            }
            if (empty($_POST['inputAddress2'])) {
                $errors['inputAddress2'] = 'a';
            }
            if (empty($_POST['NbPlace'])) {
                $errors['NbPassager'] = 'a';
            }
            if (empty($_POST['trajetHeure'])) {
                $errors['trajetHeure'] = 'a';
            }
            if (empty($_POST['trajetDate'])) {
                $errors['trajetDate'] = 'a';
            }
            echo "a";
            
            if (empty($errors)) {
                $add = $this->trajets->add($_POST);
                
                if ($add) {
                    echo "oui";
                } 
                else {
                    echo "non";
                }
                //$this->index($msg); // Redirection vers l'index
            } else { echo $errors; }
        }
        
        include "TrajetViewer.php";
    }
}