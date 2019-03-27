<?php

require_once 'connexion.php';

class adherant extends ConnexionDB  {

	public function getAdherant($id) {
		$sql = $this->cnx->prepare("SELECT * FROM adherant WHERE id=?");
		$sql->execute( array($id) );
		return $sql->fetch();
	}
}