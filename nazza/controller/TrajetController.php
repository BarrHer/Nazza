<?php

require_once ("modele/modeleTrajet.php");
require_once ("modele/modeleVille.php");

class TrajetController {

    private $trajets;
    private $villes;

    public function __construct() {
        $this->trajets = new trajet();
        $this->villes = new ville();
    }

    public function add() {
        $villes = $this->villes->getAllVille();
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
            if ($_POST['inputAddress'] == $_POST['inputAddress2']){
                $errors['trajetDate'] = 'b';
            }
            if ($_POST['inputAddress'] != 1 && $_POST['inputAddress2'] != 1){
                $errors['trajetDate'] = 'c';
            }
            session_start();
            if (empty($_SESSION)){
                $errors['trajetDate'] = 'u nid an acount';
            }
            session_write_close();
            if (empty($errors)) {
                $add = $this->trajets->add($_POST);
                
                if ($add) {
                    echo "oui";
                } 
                else {
                    echo "non";
                }
                //$this->index($msg); // Redirection vers l'index
            } else { var_dump($errors);
                var_dump($_POST['inputAddress']);
                var_dump($_POST['inputAddress2']);  }
        }
        
        include "TrajetViewer.php";
    }
}