<?php

require_once "models/BibliothequeModel.php";

class BibliothequeController
{
    public function index()
    {
        $model = new BibliothequeModel();

        $livres = $model->getLivres();

        require "views/bibliotheque.php";
    }
}