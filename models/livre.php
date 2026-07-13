<?php

class Livre
{
    private $titre;
    private $auteur;

    public function __construct($titre, $auteur)
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }
}