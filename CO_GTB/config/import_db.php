<?php
// import_db.php
// Script simple pour importer db.sample.sql dans la base MySQL
// Il est conseillé de faire une sauvegarde de la base avant d'exécuter ce script
// Il faut créer la base de données "gtb_kb" avant d'exécuter ce script
// Il faut aussi créer le fichier db.php à partir de db.sample.php
// et le configurer avec les informations de connexion à la base de données


require 'db.php'; // fichier de connexion, à créer via db.sample.php

$sqlFile = __DIR__ . '/../sql/db.sample.sql';

if (!file_exists($sqlFile)) {
    die("Fichier SQL non trouvé : $sqlFile");
}

try {
    $sql = file_get_contents($sqlFile);
    $pdo->exec($sql);
    echo "Import SQL réussi !\n";
} catch (PDOException $e) {
    die("Erreur lors de l'import SQL : " . $e->getMessage());
}
?>