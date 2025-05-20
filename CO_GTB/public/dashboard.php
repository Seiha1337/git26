<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// ...
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ma course</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <nav>
    <!-- ... -->
  </nav>


  <div>
    <!-- ... -->
  </div>
    
  <script>
    // ...
  </script>
</body>
</html>