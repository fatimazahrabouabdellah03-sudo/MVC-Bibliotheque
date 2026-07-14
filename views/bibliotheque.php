<?php
/** @var Livre[] $livres */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bibliothèque</title>
</head>
<body>

<h1>Liste des livres</h1>

<?php foreach ($livres as $livre): ?>

    <h3><?= htmlspecialchars($livre->getTitre()) ?></h3>

    <p>
        Auteur :
        <?= htmlspecialchars($livre->getAuteur()) ?>
    </p>

    <hr>

<?php endforeach; ?>

</body>
</html>