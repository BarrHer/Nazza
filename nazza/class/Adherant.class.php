<?php

class Adherant {

    private $idAdh;
    private $nomAdh;
    private $prenomAdh;
    private $pseudoAdh;
    private $passAdh;

    function __construct($idAdh, $nomAdh, $prenomAdh, $pseudoAdh, $passAdh) {

        $this->idAdh = $idAdh;
        $this->nomAdh = $nomAdh;
        $this->prenomAdh = $prenomAdh;
        $this->pseudoAdh = $pseudoAdh;
        $this->passAdh = $passAdh;
    }

    /**
     * Get the value of idAdh
     */ 
    public function getIdAdh()
    {
        return $this->idAdh;
    }

    /**
     * Set the value of idAdh
     *
     * @return  self
     */ 
    public function setIdAdh($idAdh)
    {
        $this->idAdh = $idAdh;

        return $this;
    }

    /**
     * Get the value of nomAdh
     */ 
    public function getNomAdh()
    {
        return $this->nomAdh;
    }

    /**
     * Set the value of nomAdh
     *
     * @return  self
     */ 
    public function setNomAdh($nomAdh)
    {
        $this->nomAdh = $nomAdh;

        return $this;
    }

    /**
     * Get the value of prenomAdh
     */ 
    public function getPrenomAdh()
    {
        return $this->prenomAdh;
    }

    /**
     * Set the value of prenomAdh
     *
     * @return  self
     */ 
    public function setPrenomAdh($prenomAdh)
    {
        $this->prenomAdh = $prenomAdh;

        return $this;
    }

    /**
     * Get the value of pseudoAdh
     */ 
    public function getPseudoAdh()
    {
        return $this->pseudoAdh;
    }

    /**
     * Set the value of pseudoAdh
     *
     * @return  self
     */ 
    public function setPseudoAdh($pseudoAdh)
    {
        $this->pseudoAdh = $pseudoAdh;

        return $this;
    }

    /**
     * Get the value of passAdh
     */ 
    public function getPassAdh()
    {
        return $this->passAdh;
    }

    /**
     * Set the value of passAdh
     *
     * @return  self
     */ 
    public function setPassAdh($passAdh)
    {
        $this->passAdh = $passAdh;

        return $this;
    }
}