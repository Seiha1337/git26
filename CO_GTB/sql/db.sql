-- File: db.sql
-- Description: Script SQL pour la base de données
-- Ce script crée une base de données et une table pour stocker des utilisateurs
-- et insère quelques données.

CREATE DATABASE IF NOT EXISTS gtb_kb;
USE gtb_kb;

-- Suppression de la table utilisateurs si elle existe déjà
DROP TABLE IF EXISTS utilisateurs;

-- Création de la table utilisateurs
-- La table contient un identifiant, un nom d'utilisateur, un mot de passe et un rôle
-- Le mot de passe est haché pour des raisons de sécurité
-- Le rôle est un ENUM qui peut être 'admin', 'editor' ou 'viewer'
-- Le rôle par défaut est 'viewer'
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'editor', 'viewer') NOT NULL DEFAULT 'viewer'
);

INSERT INTO utilisateurs (username, password, role) VALUES
('Charles', SHA2('MdP_A', 256), 'admin'),
('Carnus', SHA2('mot_E', 256), 'editor'),
('CIEL', SHA2('pass_V', 256), 'viewer');