<?php
class Ville {
    
    private $idVille;
    private $nomVille;
    private $longitudeVille;
    private $lattitudeVille;

    public function __construct($idVille, $nomVille, $longitudeVille, $lattitudeVille)
    {
        $this->idVille = $idVille;
        $this->nomVille = $nomVille;
        $this->longitudeVille = $longitudeVille;
        $this->lattitudeVille = $lattitudeVille;
    }



    /**
     * Get the value of idVille
     */ 
    public function getIdVille()
    {
        return $this->idVille;
    }

    /**
     * Set the value of idVille
     *
     * @return  self
     */ 
    public function setIdVille($idVille)
    {
        $this->idVille = $idVille;

        return $this;
    }

    /**
     * Get the value of nomVille
     */ 
    public function getNomVille()
    {
        return $this->nomVille;
    }

    /**
     * Set the value of nomVille
     *
     * @return  self
     */ 
    public function setNomVille($nomVille)
    {
        $this->nomVille = $nomVille;

        return $this;
    }

    /**
     * Get the value of longitudeVille
     */ 
    public function getLongitudeVille()
    {
        return $this->longitudeVille;
    }

    /**
     * Set the value of longitudeVille
     *
     * @return  self
     */ 
    public function setLongitudeVille($longitudeVille)
    {
        $this->longitudeVille = $longitudeVille;

        return $this;
    }

    /**
     * Get the value of lattitudeVille
     */ 
    public function getLattitudeVille()
    {
        return $this->lattitudeVille;
    }

    /**
     * Set the value of lattitudeVille
     *
     * @return  self
     */ 
    public function setLattitudeVille($lattitudeVille)
    {
        $this->lattitudeVille = $lattitudeVille;

        return $this;
    }
}