<?php

require_once 'connexion.php';

class trajet extends ConnexionDB  {


	public function getAllTrajet() {
        return $this->cnx->query("SELECT * FROM trajet")->fetchAll();
	}

	public function getTrajet($id) {
		$sql = $this->cnx->prepare("SELECT * FROM trajet WHERE id_trajet=?  ");
		$sql->execute( array($id) );
		return $sql->fetch();
    }
    

}
