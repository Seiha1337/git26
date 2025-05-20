<?php
session_start();
require '../../config/auth.php';
require '../../config/db.php';

// Vérifiez si l'utilisateur est un administrateur
if (!isAdmin()) {
    echo "Accès refusé.";
    exit;
}

// ...
?>