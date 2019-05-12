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
		$mdp = $empl['mdp'];
		$mdphash = password_hash($mdp, PASSWORD_DEFAULT);
		$numtel = str_replace(' ', '', $empl['numtel']);
		$sql = $this->cnx->prepare("INSERT INTO adherant (nom,prenom,pseudo,mdp,email,tel)
			VALUES (?,?,?,?,?,?)");
		$sql->execute( array($empl['nom'],$empl['prenom'],$empl['pseudo'],$mdphash,$empl['email'],$numtel));
		return $sql->rowCount();
	}

	public function login($pseudo)
	{
		$sql = $this->cnx->prepare("SELECT id_adh,mdp,status,pseudo,verif FROM adherant WHERE pseudo=?");
		$sql->execute( array($pseudo) );
		return $sql->fetch();
	}

	public function getIdAdherant($pseudo) {
		$sql = $this->cnx->prepare("SELECT id_adh FROM adherant WHERE pseudo=?");
		$sql->execute( array($pseudo) );
		return $sql->fetch();
	}

	//Retourne le code de vérif d'un adhérant
	public function getVerifCode($id)
	{
		$sql = $this->cnx->prepare("SELECT code FROM verification WHERE adh=?");
		$sql->execute( array($id) );
		return $sql->fetch();
	}

	//Ajout d'un code de vérif dans la BDD
	public function addverif($id,$code)
	{
		$sql = $this->cnx->prepare("INSERT INTO verification (adh,code)
        	VALUES (?,?)");
		$sql->execute( array($id,$code));
		return $sql->rowCount();
	}

	//Défini un adhérant comme "vérifié" et suppression de ce code dans la table "verification"
	public function updateVerif($id)
	{
		$sql = $this->cnx->prepare("UPDATE adherant SET verif=? WHERE id_adh=?");
		$sql->execute( array(true,$id));

		$sql = $this->cnx->prepare("DELETE FROM verification WHERE adh=?");
		$sql->execute( array($id));

		return $sql->rowCount();
	}

	public function update($empl,$id)
	{
		$mdp = $empl['mdp'];
		$mdphash = password_hash($mdp, PASSWORD_DEFAULT);
		$numtel = str_replace(' ', '', $empl['numtel']);
		// le if permet a l'utilisateur de modifier ses informations sans modifier son mdp
		if (empty($empl['mdp'])){
			$sql = $this->cnx->prepare("UPDATE adherant SET nom=?, prenom=?, pseudo=?,email=?, tel=? WHERE id_adh=?");
			$sql->execute( array($empl['nom'],$empl['prenom'],$empl['pseudo'],$empl['email'],$numtel,$id));
		}
		else {
			$sql = $this->cnx->prepare("UPDATE adherant SET nom=?, prenom=?, pseudo=?,mdp=?,email=?,tel=? WHERE id_adh=?");
			$sql->execute( array($empl['nom'],$empl['prenom'],$empl['pseudo'],$mdphash ,$empl['email'],$numtel,$id));
		}
		
		return $sql->rowCount();
	}

	public function delete($id)
	{
		$sql = $this->cnx->prepare("DELETE FROM adherant WHERE id_adh = ?");
		$sql->execute( array($id) );
		return $sql->rowCount();
	}

}