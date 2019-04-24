<?php

require_once 'connexion.php';

class ville extends ConnexionDB  {


	public function getAllVille() {
        return $this->cnx->query("SELECT * from ville")->fetchAll();
	}

	public function getVille($id) {
		$sql = $this->cnx->prepare("SELECT * FROM ville WHERE id_ville=?  ");
		$sql->execute( array($id) );
		return $sql->fetch();
    }

}