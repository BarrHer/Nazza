<?php

class ConnexionDB {
	protected $cnx;
	private $host       = "mysql-barrher.alwaysdata.net";
	private $username   = "barrher";
	private $password   = "pwnazza";
	private $dbname     = "barrher_nazza";
	private $options    = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	  );
	public function __construct() {
		try {
            $this->cnx = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password, $this->options);
			//$this->conn = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->pass, $this->opt);
		} catch (PDOException $e) {
		    die("Error!: " . $e->getMessage() . "<br/>");
		}
	}
}