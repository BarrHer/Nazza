<?php
require_once ("AdherantController.php");

class AccueilController
{

	private $adherants;

	public function __construct(){
		$this->adherants = new adherant() ;
	}

	public function index()
	{
		$adh = $this->adherants->getAllAdherant();
		include "indexViewer.php";
  }
    
    public function recherche()
	{
		include "RechercheViewer.php";
  }
    
    public function trajet()
	{
		include "TrajetViewer.php";
  }
    
    public function compte()
	{
		include "CompteViewer.php";
	}
}