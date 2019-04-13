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

            // Appel de l'API google
            $recaptcha_response = $_POST['token'];
            //var_dump($_POST['token']);

            // Récupération du fichier JSON et conversion en Array
            $recaptcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6LddXZ0UAAAAAHyokEA06Bvvjj_UT7sgC21aZAWR&response=' . $recaptcha_response);
            $recaptcha = json_decode($recaptcha);

            // Vérification du score obtenu (modifiable)
            //var_dump($recaptcha);
            if ($recaptcha->score < 0.5) {
                //$errors['captcha'] = 'Vous êtes probablement un robot, réessayer ulterieurement';
            }
            $msg = $recaptcha->score;
            
            if (empty($errors)) {
                $inscription = $this->adherants->inscription($_POST);
                if ($inscription) {
                    //Création d'un code + envoie d'email de véification
                    $code = uniqid();
                    $id = $this->adherants->getIdAdherant($_POST['pseudo']);
                    $this->adherants->addverif($id['id_adh'],$code);
                    $this->mailverif($_POST['email'],$id['id_adh'],$code);
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

    //Envoie d'un mail contenant l'url de verif à l'email entré par l'adhérant. 
    public function mailverif($mail,$id,$code) {
        $destination = $mail;
        $subject = "Vérification E-mail";
        $body = "<html><head></head><body>http://127.0.0.1:8080/nazza/?ctrl=Adherant&mth=verif&id=$id&code=$code</body></html>";
        $altbody = "http://127.0.0.1:8080/nazza/?ctrl=Adherant&mth=verif&id=$id&code=$code";
        include __DIR__ . '/sendmail.php';
        echo __DIR__ . '/sendmail.php'.$subject.$destination;
    }

    //Vérification du hash correspondant au compte, avec celui de la BDD
    public function verif() {
        $hash = $this->adherants->getVerifCode($_GET['id']);
        if ($hash['code'] == $_GET['code']) {
            echo "a";
            $this->adherants->updateVerif($_GET['id']);
            //header("Location: ?ctrl=Accueil&mth=index");
        } else {
            echo "Erreur lors de la vérification.";
            //header("Location: ?ctrl=Accueil&mth=index");
        }
    }

    public function connexion(){

        $errors = array();
        if (isset($_POST['btnConnexion'])) {
            $login = $this->adherants->login($_POST['pseudologin']);
            if ($login){
                if (password_verify($_POST['mdplogin'],$login['mdp'])) {
                    if ($login['verif'] == true) {
                        session_start();
                        
                        $_SESSION['id'] = $login['id_adh'];
                        $_SESSION['pseudo'] = $login['pseudo'];
                        $_SESSION['status'] = $login['status'];
                        $msg = "Connexion réussie";
                        header("Location: ?ctrl=Accueil&mth=index");
                        //$this->index($msg); // Redirection vers l'index
                    }
                    else {
                        echo "Veuillez vérifier votre compte.";
                        //Ajout d'une page dédié à la verif email
                    }
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