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
        if (isset($_POST['btnConnexion'])) {
            $login = $this->adherants->login($_POST['pseudologin']);
            if ($login){
                if (password_verify($_POST['mdplogin'],$login['mdp'])) {
                    session_start();
                    
                    $_SESSION['id'] = $login['id_adh'];
                    $_SESSION['pseudo'] = $login['pseudo'];
                    $_SESSION['status'] = $login['status'];
                    $msg = "Connexion réussie";
                    header("Location: ?ctrl=Accueil&mth=index");
                    //$this->index($msg); // Redirection vers l'index
                } 
                else {
                    echo "Mauvais pseudo ou mot de passe";
                }
            }
            else {
                echo "Erreur";
            }
            
            
            
        }
        
        
                
        include 'ConnexionViewer.php';
    }

    public function deconnexion()
    {
        session_start();
            session_unset();
            session_destroy();
            //echo session_status();
            header("Location: ?ctrl=Accueil&mth=index");
    }

    public function modification(){
        session_start();
        $data = $this->adherants->getAdherant($_SESSION['id']);
        session_write_close();
        $errors = array();

        if (isset($_POST['btnModification'])) {
            
            
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
            if ($_POST['mdp'] != $_POST['cmdp']){
                $errors['cmdp'] = 'Le mdp doit correspondre à la confirmation de mot de passe';
            }

            if (empty($errors)) {
                $modification = $this->adherants->update($_POST,$_SESSION['id']);
                session_start();
                $data = $this->adherants->getAdherant($_SESSION['id']);
                session_write_close();
                if ($modification) {
                    $msg = "L'adherant ".$_POST['prenom'].$_POST['nom']." a été modifié!";
                } 
                else {
                    $msg = "Impossible de modifier l'adherant!";
                }
                //$this->accueils->index($msg); // Redirection vers l'index
            }
        }
        include 'ModificationAdhViewer.php';
    }

    public function suppression(){
        session_start();
        $delete = $this->adherants->delete($_SESSION['id']);
        $deconnexion = $this->deconnexion();
    }

}