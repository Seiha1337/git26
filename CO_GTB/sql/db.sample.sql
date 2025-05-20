-- File: db.sample.sql
-- Description: Script SQL de test pour la base de données

-- Ce script crée une base de données et une table pour stocker des utilisateurs
-- et insère quelques données d'exemple.

-- Création de la base de données
-- Si la base de données existe déjà, on la supprime
-- pour éviter les erreurs lors de la création
CREATE DATABASE IF NOT EXISTS gtb_kb;

-- Utilisation de la base de données
USE gtb_kb;

-- Création de la table utilisateurs
-- Si la table existe déjà, on la supprime
-- pour éviter les erreurs lors de la création
DROP TABLE IF EXISTS utilisateurs;

CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertion de données dans la table utilisateurs
-- On utilise des mots de passe en clair pour cet exemple
-- mais il est recommandé de les hacher dans un environnement de production
-- pour des raisons de sécurité
INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES
('Charles', 'charles@carnus.fr', 'motdepasse1'),
('Carnus', 'carnus@carnus.fr', 'motdepasse2'),
('Bts', 'bts@carnus.fr', 'motdepasse3');

-- Requête pour récupérer tous les utilisateurs
SELECT * FROM utilisateurs;