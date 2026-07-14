<?php


require_once __DIR__ . "/Livre.php";
require_once __DIR__ . "/../config/Database.php";

class BibliothequeModel
{
    private $pdo;
    public function __construct($pdo)
    {
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
                $ligne["auteur"],
                $ligne["annee"],
                $ligne["categorie"],
                $ligne["disponible"]
            );
        }

        return $livres;
    }
}