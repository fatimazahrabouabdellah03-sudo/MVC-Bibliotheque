<?php

require_once "Livre.php";
require_once __DIR__ . "/../config/Database.php";

class BibliothequeModel
{
    private $pdo;

    public function __construct()
    {
        global $pdo;

        $this->pdo = $pdo;
    }

    public function getLivres()
    {
        $sql = "SELECT * FROM livres";

        $stmt = $this->pdo->query($sql);

        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $livres = [];

        foreach ($resultats as $ligne)
        {
            $livres[] = new Livre(
                $ligne["titre"],
                $ligne["auteur"]
            );
        }

        return $livres;
    }
}