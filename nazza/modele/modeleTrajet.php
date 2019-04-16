<?php

require_once 'connexion.php';

class trajet extends ConnexionDB  {


	public function getAllTrajet() {
        return $this->cnx->query("SELECT * from trajet ORDER BY dateTrajet DESC")->fetchAll();
	}

	public function getTrajet($id) {
		$sql = $this->cnx->prepare("SELECT * FROM trajet WHERE id_trajet=?  ");
		$sql->execute( array($id) );
		return $sql->fetch();
	}

	public function getTrajetId() {
		return $this->cnx->query("SELECT LAST_INSERT_ID() FROM trajet")->fetchAll();
	}
	
	public function add($empl)
	{
		$sql = $this->cnx->prepare("INSERT INTO trajet (debut,fin,nb_places,dateTrajet) 
        VALUES (?,?,?,?)");
		$sql->execute( array($empl['inputAddress'],$empl['inputAddress2'],$empl['NbPlace'], $empl['trajetDate']." ".$empl['trajetHeure']));
		return $sql->rowCount();
	}

	public function propose($idTrajet,$idAdh)
	{
		$sql = $this->cnx->prepare("INSERT INTO propose (id_trajet_Propose,id_adh_Adherant) 
        VALUES (?,?)");
		$sql->execute( array($idTrajet,$idAdh));
		return $sql->rowCount();
	}

	public function getProposeId($idAdh) {
		$sql = $this->cnx->prepare("SELECT id_trajet_Propose FROM propose WHERE id_adh_Adherant=?  ");
		$sql->execute( array($idAdh) );
		return $sql->fetchAll();
	}

	public function delTraj($id)
	{
		$sql = $this->cnx->prepare("DELETE FROM trajet WHERE id_trajet = ?");
		$sql->execute( array($id) );
		return $sql->rowCount();
	}

	public function delTrajPropose($id)
	{
		$sql = $this->cnx->prepare("DELETE FROM propose WHERE id_trajet_Propose = ?");
		$sql->execute( array($id) );
		return $sql->rowCount();
	}

}
