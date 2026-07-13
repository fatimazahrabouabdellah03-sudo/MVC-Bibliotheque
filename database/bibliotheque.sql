-- Création de la base de données
CREATE DATABASE IF NOT EXISTS bibliotheque;
USE bibliotheque;

-- Création de la table livres
CREATE TABLE livres (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        titre VARCHAR(255) NOT NULL,
                        auteur VARCHAR(255) NOT NULL,
                        annee INT,
                        categorie VARCHAR(100),
                        disponible BOOLEAN DEFAULT TRUE
);

-- Insertion des données
INSERT INTO livres (titre, auteur, annee, categorie, disponible)
VALUES
    ('1984', 'George Orwell', 1949, 'Roman', TRUE),
    ('Le Petit Prince', 'Antoine de Saint-Exupéry', 1943, 'Conte', FALSE),
    ('Clean Code', 'Robert C. Martin', 2008, 'Programmation', TRUE),
    ('Harry Potter', 'J. K. Rowling', 1997, 'Fantastique', TRUE);