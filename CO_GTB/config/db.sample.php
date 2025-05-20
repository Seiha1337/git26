<?php

// db.sample.php
# Si vous télécharger et importer dans Xampp le fichier db.sample.sql
# et que vous l'avez renommé en db.sql.
# Pour le fichier db.sample.php , vous devez le renommer en db.php
# et le remplir avec vos identifiants de connexion à la base de données
/**
* 'DsnName',
* Le nom de votre serveur hôte, exp. ``localhost``, ``hostname``, ``hostname.example.com``, ou l'adresse IP.
* Pour spécifier un port, utilisez ``hostname:####``; pour les adresses IPv6, utilisez la notation URI ``[ip]:port``.
*/

// db.sample.php
// Exemple de fichier de connexion à la base de données
// db.php

$host = 'DsnName';          // Adresse du serveur MySQL
$dbname = 'nom_de_la_base';  // Nom de la base de données
$username = 'votre_utilisateur';  // Nom d'utilisateur MySQL
$password = 'votre_mot_de_passe'; // Mot de passe MySQL
$charset = 'utf8mb4';

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    // echo "Connexion réussie";
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}