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

	public function est_passage($idTrajet,$idAdh)
	{
		$sql = $this->cnx->prepare("INSERT INTO est_passage (id_trajet_est_passage,id_adh_Adherant) 
        VALUES (?,?)");
		$sql->execute( array($idTrajet,$idAdh));
		return $sql->rowCount();
	}

	public function getPassageId($idAdh) {
		$sql = $this->cnx->prepare("SELECT * FROM est_passage WHERE id_adh_Adherant=?  ");
		$sql->execute( array($idAdh) );
		return $sql->fetchAll();
	}

	public function getProposeId($idAdh) {
		$sql = $this->cnx->prepare("SELECT id_trajet_Propose FROM propose WHERE id_adh_Adherant=?  ");
		$sql->execute( array($idAdh) );
		return $sql->fetchAll();
	}

	public function getPseudoPropose($idTrajet) {
		$sql = $this->cnx->prepare("SELECT pseudo FROM adherant WHERE id_adh = (SELECT id_adh_Adherant FROM propose WHERE id_trajet_Propose=?)");
		$sql->execute( array($idTrajet) );
		return $sql->fetch();
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

	public function delTrajPassage($id, $idAdh)
	{
		$sql = $this->cnx->prepare("DELETE FROM est_passage WHERE id_trajet_est_passage = ? AND id_adh_Adherant=?");
		$sql->execute( array($id, $idAdh) );
		return $sql->rowCount();
	}

	public function getNbPlacesRestantes($idTrajet) {
		$sql = $this->cnx->prepare("SELECT (SELECT nb_places FROM trajet WHERE id_trajet = ?) - (SELECT count(*) FROM est_passage WHERE id_trajet_est_passage = ?) AS 'PlacesRestantes'");
		$sql->execute( array($idTrajet, $idTrajet) );
		return $sql->fetch();
	}

	public function verifTrajet($idTrajet) {
		$sql = $this->cnx->prepare("SELECT pseudo FROM adherant WHERE id_adh = (SELECT id_adh_Adherant FROM propose WHERE id_trajet_Propose=?)");
		$sql->execute( array($idTrajet) );
		return $sql->fetch();
	}

}
