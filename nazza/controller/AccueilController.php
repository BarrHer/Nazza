<?php

class AccueilController
{
	public function index()
	{
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