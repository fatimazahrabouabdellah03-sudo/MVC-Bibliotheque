<?php

class Livre
{
    private $id;
    private $titre;
    private $auteur;
    private $annee;
    private $categorie;
    private $disponible;

    public function __construct($titre, $auteur, $annee, $categorie, $disponible, $id = null)
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->annee = $annee;
        $this->categorie = $categorie;
        $this->disponible = $disponible;
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
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
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }
    public function setAnnee($annee)
    {
        $this->annee = $annee;
    }
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;
    }
}