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
		$traj2 = $this->trajets->getAllTrajet();
		session_start();
		if (!empty($_SESSION)){
		$proposeId = $this->trajets->getProposeId($_SESSION['id']);
		}
		session_write_close();
		
		foreach ($traj2 as $key => $value) {
			
			$traj[$key]['debut']=$this->villes->getVille($traj2[$key]['debut']);
			$traj[$key]['fin']=$this->villes->getVille($traj2[$key]['fin']);
			$traj[$key]['dateTrajet']=$traj2[$key]['dateTrajet'];
			$traj[$key]['nb_places']=$traj2[$key]['nb_places'];
			$traj[$key]['id_trajet']=$traj2[$key]['id_trajet'];
			 
			}
		include "indexViewer.php";
  	}
    
    public function recherche()
	{
		$traj2 = $this->trajets->getAllTrajet();
		
		foreach ($traj2 as $key => $value) {
			 
			$traj[$key]['debut']=$this->villes->getVille($traj2[$key]['debut']);
			$traj[$key]['fin']=$this->villes->getVille($traj2[$key]['fin']);
			$traj[$key]['dateTrajet']=$traj2[$key]['dateTrajet'];
			$traj[$key]['nb_places']=$traj2[$key]['nb_places'];
			$traj[$key]['id_trajet']=$traj2[$key]['id_trajet'];
			 
			}
		include "RechercheViewer.php";
  	}
    
    public function trajet()
	{
		$villes = $this->villes->getAllVille();
		include "TrajetViewer.php";
  	}
    
    public function compte()
	{
		include "CompteViewer.php";
	}

}