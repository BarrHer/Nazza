<?php

require_once 'connexion.php';

class adherant extends ConnexionDB  {


	public function getAllAdherant() {
        return $this->cnx->query("SELECT * FROM adherant")->fetchAll();
	}

	public function getAdherant($id) {
		$sql = $this->cnx->prepare("SELECT * FROM adherant WHERE id_adh=?");
		$sql->execute( array($id) );
		return $sql->fetch();
	}

	public function inscription($empl){
		$sql = $this->cnx->prepare("INSERT INTO adherant (nom,prenom,pseudo,mdp,email)
        	VALUES (?,?,?,?,?)");
		$sql->execute( array($empl['nom'],$empl['prenom'],$empl['pseudo'],$empl['mdp'],$empl['email']));
		return $sql->rowCount();
	}
}