<?php
#session_start();
#require '../config/db.php';

# ...
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <div>
    <h1>Bonjour,</h1>
    <h2>Vous êtes sur la page d'accueil de notre projet</h2>
    <p>Pour vous connecter, veuillez utiliser le formulaire ci-dessous :</p>
    <form action="login/login.php" method="POST">
      <label for="username">Nom d'utilisateur :</label>
      <input type="text" id="username" name="username" required>
      <br>
      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" required>
      <br>
      <button type="submit">Se connecter</button>
    <!-- ... -->
  </div>
</body>
</html>