<?php
session_start();
require '../config/auth.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

if (!isAdmin()) {
    echo "Accès refusé.";
    exit;
}

# ...
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course d'orientation</title>
  <link rel="stylesheet" href="../public/css/style.css">
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
