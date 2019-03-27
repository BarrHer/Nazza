<?php

require_once 'connexion.php';

class trajet extends ConnexionDB  {


	public function getAllTrajet() {
        return $this->cnx->query("SELECT * FROM adherant")->fetchAll();
	}

	public function getTrajet($id) {
		$sql = $this->cnx->prepare("SELECT * FROM adherant WHERE id_adh=?");
		$sql->execute( array($id) );
		return $sql->fetch();
    }
    
    public function add($traj)
	{
		$sql = $this->cnx->prepare("INSERT INTO trajet (id_trajet,debut,fin,nb_places,dateTrajet) 
        VALUES (?,?,?,?)");
		$sql->execute( array(5,$traj['inputAddress'],$traj['inputAddress2'],$traj['NbPlace'],"2019-03-27 14:22:59") );
		return $sql->rowCount();
	}

}