<?php

class Livre
{
    private $titre;
    private $auteur;
    private $annee;
    private $categorie;
    private $disponible;

    public function __construct($titre, $auteur, $annee, $categorie, $disponible)
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->annee = $annee;
        $this->categorie = $categorie;
        $this->disponible = $disponible;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }

    public function getAnnee()
    {
        return $this->annee;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function isDisponible()
    {
        return $this->disponible;
    }
}