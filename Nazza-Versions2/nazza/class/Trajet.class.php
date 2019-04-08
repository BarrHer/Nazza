<?php

class Trajet {

    private $idTrajet;
    private $debutTrajet;
    private $finTrajet;
    private $nbPlacesTrajet;
    private $villeDepTrajet;
    private $villeFinTrajet;

    public function __construct($idTrajet, $debutTrajet, $FinTrajet, $nbPlacesTrajet, $villeDepTrajet, $villeFinTrajet)
    {
        $this->idTrajet = $idTrajet;
        $this->debutTrajet = $debutTrajet;
        $this->FinTrajet = $FinTrajet;
        $this->nbPlacesTrajet = $nbPlacesTrajet;
        $this->villeDepTrajet = $villeDepTrajet;
        $this->villeFinTrajet = $villeFinTrajet;
    }



    /**
     * Get the value of idTrajet
     */ 
    public function getIdTrajet()
    {
        return $this->idTrajet;
    }

    /**
     * Set the value of idTrajet
     *
     * @return  self
     */ 
    public function setIdTrajet($idTrajet)
    {
        $this->idTrajet = $idTrajet;

        return $this;
    }

    /**
     * Get the value of debutTrajet
     */ 
    public function getDebutTrajet()
    {
        return $this->debutTrajet;
    }

    /**
     * Set the value of debutTrajet
     *
     * @return  self
     */ 
    public function setDebutTrajet($debutTrajet)
    {
        $this->debutTrajet = $debutTrajet;

        return $this;
    }

    /**
     * Get the value of finTrajet
     */ 
    public function getFinTrajet()
    {
        return $this->finTrajet;
    }

    /**
     * Set the value of finTrajet
     *
     * @return  self
     */ 
    public function setFinTrajet($finTrajet)
    {
        $this->finTrajet = $finTrajet;

        return $this;
    }

    /**
     * Get the value of nbPlacesTrajet
     */ 
    public function getNbPlacesTrajet()
    {
        return $this->nbPlacesTrajet;
    }

    /**
     * Set the value of nbPlacesTrajet
     *
     * @return  self
     */ 
    public function setNbPlacesTrajet($nbPlacesTrajet)
    {
        $this->nbPlacesTrajet = $nbPlacesTrajet;

        return $this;
    }

    /**
     * Get the value of villeDepTrajet
     */ 
    public function getVilleDepTrajet()
    {
        return $this->villeDepTrajet;
    }

    /**
     * Set the value of villeDepTrajet
     *
     * @return  self
     */ 
    public function setVilleDepTrajet($villeDepTrajet)
    {
        $this->villeDepTrajet = $villeDepTrajet;

        return $this;
    }

    /**
     * Get the value of villeFinTrajet
     */ 
    public function getVilleFinTrajet()
    {
        return $this->villeFinTrajet;
    }

    /**
     * Set the value of villeFinTrajet
     *
     * @return  self
     */ 
    public function setVilleFinTrajet($villeFinTrajet)
    {
        $this->villeFinTrajet = $villeFinTrajet;

        return $this;
    }
}