<?php
session_start();
require '../config/auth.php';

if (!isAdmin()) {
    echo "Accès refusé.";
    exit;
}

if (!isset($_SESSION['user_id'])) {
    echo "Erreur : utilisateur non connecté.";
    exit;
}

// ...
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Admin – Gestion des utilisateurs</title>
</head>
<body>

  <!-- Navigation -->
  <nav>
    <!-- ... -->
  </nav>

  <div>
    <!-- ... -->
  </div>

  <!-- Footer -->
  <footer>
    <!-- ... -->
  </footer>

  <!-- scripts -->
  <script>
    // ...
  </script>
  <script src="../public/assets/js/script.js"></script>

</body>
</html>
