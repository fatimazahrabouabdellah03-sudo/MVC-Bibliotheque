<?php /** @var Livre[] $livres */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bibliothèque</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
            background: #f0f0f0;
        }
        h1 {
            color: #333;
        }
        h2 {
            color: #555;
            margin-top: 30px;
        }
        form {
            background: #f5f5f5;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        input, select {
            padding: 8px;
            margin: 5px 0;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            color: white;
            font-weight: bold;
            margin-top: 10px;
        }
        .btn-add {
            background: #007bff;
        }
        .btn-add:hover {
            background: #0056b3;
        }
        .btn-modify {
            background: #ffc107;
            color: black;
            padding: 5px 10px;
            margin-right: 10px;
            text-decoration: none;
            display: inline-block;
            font-weight: normal;
        }
        .btn-modify:hover {
            background: #e0a800;
        }
        .livre {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px 0;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .livre h3 {
            margin-top: 0;
            color: #333;
        }
        .livre p {
            margin: 8px 0;
            color: #666;
        }
        .actions {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        .actions form {
            display: inline;
            background: none;
            padding: 0;
            margin-right: 10px;
            border: none;
        }
        .btn-delete {
            background: #dc3545;
            padding: 5px 10px;
            margin: 0;
        }
        .btn-delete:hover {
            background: #c82333;
        }
        .alert {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<h1>📚 Bibliothèque</h1>

<!-- Formulaire d'ajout/modification -->
<h2><?= isset($livreAEditer) ? 'Modifier un livre' : 'Ajouter un livre' ?></h2>
<form method="POST">
    <?php if (isset($livreAEditer)): ?>
        <input
                type="hidden"
                name="id"
                value="<?= $livreAEditer->getId() ?>">
    <?php endif; ?>

    <input
            type="text"
            name="titre"
            placeholder="Titre"
            value="<?= isset($livreAEditer) ? htmlspecialchars($livreAEditer->getTitre()) : '' ?>"
            required>

    <input
            type="text"
            name="auteur"
            placeholder="Auteur"
            value="<?= isset($livreAEditer) ? htmlspecialchars($livreAEditer->getAuteur()) : '' ?>"
            required>

    <input
            type="number"
            name="annee"
            placeholder="Année"
            value="<?= isset($livreAEditer) ? htmlspecialchars($livreAEditer->getAnnee()) : '' ?>"
            required>

    <input
            type="text"
            name="categorie"
            placeholder="Catégorie"
            value="<?= isset($livreAEditer) ? htmlspecialchars($livreAEditer->getCategorie()) : '' ?>"
            required>

    <label>
        <input
                type="checkbox"
                name="disponible"
                style="width:auto;"
                <?= isset($livreAEditer) && $livreAEditer->isDisponible() ? 'checked' : '' ?>>
        Disponible
    </label>

    <br><br>

    <button
            type="submit"
            name="<?= isset($livreAEditer) ? 'modifier' : 'ajouter' ?>"
            class="btn-add">
        <?= isset($livreAEditer) ? 'Mettre à jour' : 'Ajouter un livre' ?>
    </button>

    <?php if (isset($livreAEditer)): ?>
        <a href="index.php" style="padding: 10px 20px; background: #6c757d; color: white; text-decoration: none; border-radius: 3px; display: inline-block; margin-left: 10px;">
            Annuler
        </a>
    <?php endif; ?>
</form>

<!-- Liste des livres -->
<h2>Liste des livres (<?= count($livres) ?>)</h2>

<?php if (empty($livres)): ?>
    <p style="color: #666;">Aucun livre en base de données.</p>
<?php else: ?>
    <?php foreach ($livres as $livre): ?>
        <div class="livre">
            <h3><?= htmlspecialchars($livre->getTitre()) ?></h3>

            <p>
                <strong>Auteur :</strong>
                <?= htmlspecialchars($livre->getAuteur()) ?>
            </p>

            <p>
                <strong>Année :</strong>
                <?= htmlspecialchars($livre->getAnnee()) ?>
            </p>

            <p>
                <strong>Catégorie :</strong>
                <?= htmlspecialchars($livre->getCategorie()) ?>
            </p>

            <p>
                <strong>Disponible :</strong>
                <span style="<?= $livre->isDisponible() ? 'color: green;' : 'color: red;' ?>">
                    <?= $livre->isDisponible() ? '✓ Oui' : '✗ Non' ?>
                </span>
            </p>

            <div class="actions">
                <!-- Bouton Modifier -->
                <a href="?editer=<?= $livre->getId() ?>" class="btn-modify">
                    ✎ Modifier
                </a>

                <!-- Bouton Supprimer -->
                <form
                        method="GET"
                        style="display:inline;"
                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');">
                    <input
                            type="hidden"
                            name="supprimer"
                            value="<?= $livre->getId() ?>">
                    <button
                            type="submit"
                            class="btn-delete">
                        🗑️ Supprimer
                    </button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>