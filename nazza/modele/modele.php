<?php

require_once 'connexion.php';

class adherant extends ConnexionDB  {

	public function getTest() {

        return $this->cnx->query("SELECT nom FROM adherant")->fetch();
    }
}