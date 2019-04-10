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
	
	public function add($empl)
	{
		$sql = $this->cnx->prepare("INSERT INTO trajet (debut,fin,nb_places,dateTrajet) 
        VALUES (?,?,?,?)");
		//$sql->execute( array($traj['inputAddress'],$traj['inputAddress2'],$traj['NbPlace'],"2019-03-27 14:22:59") );
		$sql->execute( array($empl['inputAddress'],$empl['inputAddress2'],$empl['NbPlace'], $empl['trajetDate']." ".$empl['trajetHeure']));
		return $sql->rowCount();
	}
	
	

}
