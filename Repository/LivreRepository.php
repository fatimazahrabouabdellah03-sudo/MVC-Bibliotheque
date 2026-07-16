<?php
require_once __DIR__ . "/../models/Livre.php";
class LivreRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function findAll()
    {
        $sql = "SELECT * FROM livres";
        /** @var PDOStatement $stmt */
        $stmt = $this->pdo->query($sql);
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $livres = [];
        foreach ($resultats as $ligne) {
            $livres[] = new Livre(
                $ligne["titre"],
                $ligne["auteur"],
                $ligne["annee"],
                $ligne["categorie"],
                $ligne["disponible"],
                $ligne["id"]
            );
        }

        return $livres;
    }
    public function findById($id)
    {
        $sql = "SELECT * FROM livres WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            return null;
        }

        return new Livre(
            $result["titre"],
            $result["auteur"],
            $result["annee"],
            $result["categorie"],
            $result["disponible"],
            $result["id"]
        );
    }
    public function create($titre, $auteur, $annee, $categorie, $disponible)
    {
        $sql = "INSERT INTO livres (titre, auteur, annee, categorie, disponible) 
                VALUES (:titre, :auteur, :annee, :categorie, :disponible)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':titre' => $titre,
            ':auteur' => $auteur,
            ':annee' => $annee,
            ':categorie' => $categorie,
            ':disponible' => $disponible
        ]);

        return $this->pdo->lastInsertId();
    }
    public function update($id, $titre, $auteur, $annee, $categorie, $disponible)
    {
        $sql = "UPDATE livres 
                SET titre = :titre, auteur = :auteur, annee = :annee, 
                    categorie = :categorie, disponible = :disponible 
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':titre' => $titre,
            ':auteur' => $auteur,
            ':annee' => $annee,
            ':categorie' => $categorie,
            ':disponible' => $disponible
        ]);

        return $stmt->rowCount() > 0;
    }
    public function delete($id)
    {
        $sql = "DELETE FROM livres WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->rowCount() > 0;
    }
}