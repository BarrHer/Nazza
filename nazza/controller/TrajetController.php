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
                $errors['compte'] = 'u nid an acount';
            }
            else {
                $idAdh = $_SESSION['id'];
            }
            session_write_close();
            
            if (empty($errors)) {
                // add : insérer trajet dans db
                $add = $this->trajets->add($_POST);
                // récupération du dernier id trajet
                $idTrajet = $this->trajets->getTrajetId();

                //var_dump($idTrajet[0]["LAST_INSERT_ID()"]);

                // ajout de l'id du trajet avec l'id de l'adh dans la table propose
                $propose = $this->trajets->propose($idTrajet[0]["LAST_INSERT_ID()"], $idAdh);

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

    public function delTraj() {
        $del = $this->trajets->delTraj($_GET['id']);
        $delPropose = $this->trajets->delTrajPropose($_GET['id']);
        if ($del) {
            $msg = "Le trajet ". $_GET['id']." a été supprimé.";
        } 
        else {
            $msg = "Impossible de supprimer le trajet!";
        }
        if ($_GET['page'] == 1){
            header('Location: ?ctrl=Accueil&mth=recherche');
        } else {
            header('Location: ?ctrl=Accueil&mth=index');
        }
        
    }

    public function est_passage() {
        session_start();
        if (empty($_SESSION)){
            $errors['compte'] = 'u nid an acount';
        }
        else {
            $idAdh = $_SESSION['id'];
        }
        session_write_close();
        $join = $this->trajets->est_passage($_GET['id'], $idAdh);
        if ($join) {
            $msg = "Le trajet ". $_GET['id']." a été rejoint.";
        } 
        else {
            $msg = "Impossible de rejoindre le trajet!";
        }
        if ($_GET['page'] == 1){
            header('Location: ?ctrl=Accueil&mth=recherche');
        } else {
            header('Location: ?ctrl=Accueil&mth=index');
        }
    }

    public function delTrajPassage() {
        $delPassage = $this->trajets->delTrajPassage($_GET['id']);
        if ($del) {
            $msg = "Le trajet ". $_GET['id']." a été annulé.";
        } 
        else {
            $msg = "Impossible d'annuler le trajet!";
        }
        if ($_GET['page'] == 1){
            header('Location: ?ctrl=Accueil&mth=recherche');
        } else {
            header('Location: ?ctrl=Accueil&mth=index');
        }
    }
}