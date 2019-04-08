<?php

require_once 'connexion.php';

class trajet extends ConnexionDB  {


	public function getAllTrajet() {
        return $this->cnx->query("SELECT * from trajet ORDER BY date DESC")->fetchAll();
	}

	public function getTrajet($id) {
		$sql = $this->cnx->prepare("SELECT * FROM trajet WHERE id_trajet=?  ");
		$sql->execute( array($id) );
		return $sql->fetch();
    }
	
	

}
