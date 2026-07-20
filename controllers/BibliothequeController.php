<?php

require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/BibliothequeModel.php";

class BibliothequeController
{
    private BibliothequeModel $model;

    public function __construct()
    {
        $pdo = Database::getInstance()->getPdo();
        $this->model = new BibliothequeModel($pdo);
    }

    public function index()
    {
        try {

            if (
                $_SERVER['REQUEST_METHOD'] === 'POST'
                && isset($_POST['ajouter'])
            ) {
                $this->ajouter();
            }

            if (
                $_SERVER['REQUEST_METHOD'] === 'POST'
                && isset($_POST['modifier'])
            ) {
                $this->modifier();
            }

            if (isset($_GET['supprimer'])) {
                $this->supprimer();
            }

            $livres = $this->model->getLivres();

            require __DIR__ .
                "/../views/bibliotheque.php";

        } catch (Exception $e) {

            echo htmlspecialchars(
                $e->getMessage()
            );
        }
    }

    private function ajouter()
    {
        $titre = trim($_POST['titre'] ?? '');
        $auteur = trim($_POST['auteur'] ?? '');
        $annee = trim($_POST['annee'] ?? '');
        $categorie = trim($_POST['categorie'] ?? '');

        $disponible =
            isset($_POST['disponible']) ? 1 : 0;

        if (
            empty($titre)
            || empty($auteur)
            || empty($annee)
            || empty($categorie)
        ) {
            throw new Exception(
                "Tous les champs sont obligatoires."
            );
        }

        $this->model->ajouterLivre(
            $titre,
            $auteur,
            $annee,
            $categorie,
            $disponible
        );

        header("Location: index.php");
        exit;
    }

    private function modifier()
    {
        $id = filter_input(
            INPUT_POST,
            'id',
            FILTER_VALIDATE_INT
        );

        $titre = trim($_POST['titre'] ?? '');
        $auteur = trim($_POST['auteur'] ?? '');
        $annee = trim($_POST['annee'] ?? '');
        $categorie = trim($_POST['categorie'] ?? '');

        $disponible =
            isset($_POST['disponible']) ? 1 : 0;

        if (
            !$id
            || empty($titre)
            || empty($auteur)
            || empty($annee)
            || empty($categorie)
        ) {
            throw new Exception(
                "Tous les champs sont obligatoires."
            );
        }

        $this->model->mettreAJourLivre(
            $id,
            $titre,
            $auteur,
            $annee,
            $categorie,
            $disponible
        );

        header("Location: index.php");
        exit;
    }

    private function supprimer()
    {
        $id = filter_input(
            INPUT_GET,
            'supprimer',
            FILTER_VALIDATE_INT
        );

        if (!$id) {
            throw new Exception(
                "ID invalide."
            );
        }

        $this->model->supprimerLivre($id);

        header("Location: index.php");
        exit;
    }
}