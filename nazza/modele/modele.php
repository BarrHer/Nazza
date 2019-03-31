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

	public function login($pseudo, $mdp)
	{
		$sql = $this->cnx->prepare("SELECT id_adh,mdp,status,pseudo FROM adherant WHERE pseudo=? AND mdp=?");
		$sql->execute( array($pseudo, $mdp) );
		return $sql->fetch();
	}

	public function update($empl,$id)
	{
		$sql = $this->cnx->prepare("UPDATE adherant SET nom=?, prenom=?, pseudo=?,mdp=?,email=? WHERE id_adh=?");
		$sql->execute( array($empl['nom'],$empl['prenom'],$empl['pseudo'],$empl['mdp'],$empl['email'],$id));
		return $sql->rowCount();
	}
}