<?php
require_once ("AdherantController.php");
require_once ("TrajetController.php");

class AccueilController
{

	private $adherants;
	private $trajets;

	public function __construct(){
		$this->adherants = new adherant() ;
		$this->trajets = new trajet() ;
		
		
		
	}

	public function index()
	{
		// $adh = $this->adherants->getAllAdherant();
		$traj = $this->trajets->getAllTrajet();
		
		
		
		include "indexViewer.php";
  }
    
    public function recherche()
	{
		$traj = $this->trajets->getAllTrajet();
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