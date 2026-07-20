<?php

require_once __DIR__
    . "/../Repository/LivreRepository.php";

class BibliothequeModel
{
    private LivreRepository $repository;

    public function __construct(PDO $pdo)
    {
        $this->repository =
            new LivreRepository($pdo);
    }

    public function getLivres()
    {
        return $this->repository->findAll();
    }

    public function ajouterLivre(
        $titre,
        $auteur,
        $annee,
        $categorie,
        $disponible
    ) {
        return $this->repository->create(
            $titre,
            $auteur,
            $annee,
            $categorie,
            $disponible
        );
    }

    public function mettreAJourLivre(
        $id,
        $titre,
        $auteur,
        $annee,
        $categorie,
        $disponible
    ) {
        return $this->repository->update(
            $id,
            $titre,
            $auteur,
            $annee,
            $categorie,
            $disponible
        );
    }

    public function supprimerLivre($id)
    {
        return $this->repository->delete($id);
    }

    public function getLivreById($id)
    {
        return $this->repository->findById($id);
    }
}