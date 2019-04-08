<?php
require_once ("AdherantController.php");
require_once ("TrajetController.php");
require_once ("VilleController.php");

class AccueilController
{

	private $adherants;
	private $trajets;
	private $villes;

	public function __construct(){
		$this->adherants = new adherant() ;
		$this->trajets = new trajet() ;
		$this->villes = new ville() ;
		
		
		
	}

	public function index()
	{
		// $adh = $this->adherants->getAllAdherant();
		//$traj = $this->trajets->getAllTrajet();
		$traj2 = $this->trajets->getAllTrajet();
		
		foreach ($traj2 as $key => $value) {
			 
			
			 $traj[$key]['debut']=$this->villes->getVille($traj2[$key]['debut']);
			 $traj[$key]['fin']=$this->villes->getVille($traj2[$key]['fin']);
			 $traj[$key]['date']=$traj2[$key]['date'];
			 $traj[$key]['nb_places']=$traj2[$key]['nb_places'];
			 
			}
		
		
		include "indexViewer.php";
  }
    
    public function recherche()
	{
		$traj2 = $this->trajets->getAllTrajet();
		
		foreach ($traj2 as $key => $value) {
			 
			
			 $traj[$key]['debut']=$this->villes->getVille($traj2[$key]['debut']);
			 $traj[$key]['fin']=$this->villes->getVille($traj2[$key]['fin']);
			 $traj[$key]['date']=$traj2[$key]['date'];
			 $traj[$key]['nb_places']=$traj2[$key]['nb_places'];
			 
			}
		
		
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