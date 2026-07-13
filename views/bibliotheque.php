<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bibliothèque</title>
</head>
<body>

<h1>Liste des livres</h1>

<?php foreach ($livres as $livre): ?>

    <h3><?= $livre->getTitre() ?></h3>

    <p>
        Auteur :
        <?= $livre->getAuteur() ?>
    </p>

    <hr>

<?php endforeach; ?>

</body>
</html>