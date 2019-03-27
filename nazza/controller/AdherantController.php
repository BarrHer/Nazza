<?php

require_once ("modele/modele.php");
require_once ("AccueilController.php");

class AdherantController {

    private $adherants;
    private $accueils;
    public function __construct() {
        $this->adherants = new adherant();
        $this->accueils = new AccueilController();

    }

    public function inscription(){
        $errors = array();

        if (isset($_POST['btnInscription'])) {

            if (empty($_POST['prenom'])) {
                $errors['prenom'] = 'Le prénom doit être rempli';
            }
            if (empty($_POST['nom'])) {
                $errors['nom'] = 'Le nom doit être rempli';
            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['email'])) {
                $errors['email'] = 'Merci de remplir l\'adresse email';
            }
            if (empty($_POST['pseudo'])) {
                $errors['pseudo'] = 'Le pseudo doit être remplie';
            }
            if (empty($_POST['mdp'])) {
                $errors['mdp'] = 'Le mdp doit être remplie';
            }
            
            if (empty($errors)) {
                $inscription = $this->adherants->inscription($_POST);
                if ($inscription) {
                    $msg = "L'adherant ".$_POST['prenom'].$_POST['nom']." a été ajouté!";
                } 
                else {
                    $msg = "Impossible d'ajouter l'adherant!";
                }
                //$this->accueils->index($msg); // Redirection vers l'index
            }
        }
        include 'CreationcompteViewer.php';
    }

    public function connexion(){
        $errors = array();

        if (isset($_POST['submit'])) {

            if (empty($_POST['prenom'])) {
                $errors['prenom'] = 'Le prénom doit être rempli';
            }
            if (empty($_POST['nom'])) {
                $errors['nom'] = 'Le nom doit être rempli';
            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['email'])) {
                $errors['email'] = 'Merci de remplir l\'adresse email';
            }
            if (!is_numeric($_POST['age']) && !empty($_POST['age'])) {
                $errors['age'] = 'L\'age doit être un nombre';
            }
            if (empty($_POST['ville'])) {
                $errors['ville'] = 'La ville doit être remplie';
            }
            
            if (empty($errors)) {
                $add = $this->employes->add($_POST);
                if ($add) {
                    $msg = "L'adherant ".$_POST['prenom'].$_POST['nom']." a été ajouté!";
                } 
                else {
                    $msg = "Impossible d'ajouter l'adherant!";
                }
                $this->index($msg); // Redirection vers l'index
            }
        }
        include 'ConnexionViewer.php';
    }

}