<?php
class BibliothequeController
{
    public function index()
    {
        try{
            global $pdo;
            $model = new BibliothequeModel($pdo);
            $livres = $model->getLivres();
            require __DIR__ . "/../views/bibliotheque.php";
        } catch (Exception $e) {
            echo "une erreur est survenue"
                .$e->getMessage();
        }

    }
}