<?php /** @var Livre[] $livres */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bibliothèque</title>
</head>
<body>

<h1>Liste des livres</h1>

<?php foreach ($livres as $livre): ?>

    <h3>
        <?= htmlspecialchars($livre->getTitre()) ?>
    </h3>

    <form method="GET" style="display:inline;">
        <input
                type="hidden"
                name="modifier"
                value="<?= $livre->getId() ?>">

        <button type="submit">
            Modifier
        </button>
    </form>

    <form method="GET"
          style="display:inline;"
          onsubmit="return confirm('Supprimer ce livre ?');">

        <input
                type="hidden"
                name="supprimer"
                value="<?= $livre->getId() ?>">

        <button type="submit">
            Supprimer
        </button>
    </form>

    <p>
        Auteur :
        <?= htmlspecialchars($livre->getAuteur()) ?>
    </p>

    <p>
        Année :
        <?= htmlspecialchars($livre->getAnnee()) ?>
    </p>

    <p>
        Catégorie :
        <?= htmlspecialchars($livre->getCategorie()) ?>
    </p>

    <p>
        Disponible :
        <?= $livre->isDisponible() ? 'Oui' : 'Non' ?>
    </p>

    <hr>

<?php endforeach; ?>

</body>
</html>