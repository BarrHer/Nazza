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
}