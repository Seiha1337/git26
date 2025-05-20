#!/bin/bash

set -e  # Arrête le script en cas d'erreur

echo "📦 Déploiement en cours..."

# Vérification des outils nécessaires
command -v rsync >/dev/null 2>&1 || { echo "❌ rsync n'est pas installé. Abandon."; exit 1; }
command -v tar >/dev/null 2>&1 || { echo "❌ tar n'est pas installé. Abandon."; exit 1; }

# Nettoyage dossier précédent
if [ -d "dist" ]; then
  echo "Nettoyage du dossier existant /dist"
  rm -rf dist
fi
mkdir dist

# Copie des fichiers principaux (en ignorant ceux du .gitignore)
echo "📁 Copie des fichiers vers /dist..."
rsync -av --exclude='.git' \
          --exclude='.DS_Store' \
          --exclude='*.log' \
          --exclude='config/db.php' \
          --exclude='deploy.sh' \
          ./ dist/

echo "Fichiers copiés dans /dist"

# Ajouter éventuellement une version prod de .htaccess
if [ -f ".htaccess" ]; then
  cp .htaccess dist/.htaccess
  echo "Fichier .htaccess ajouté à /dist"
else
  echo "⚠️ Fichier .htaccess introuvable, ignoré."
fi

# Création d'une archive compressée
echo "📦 Création d'une archive compressée dist.tar.gz..."
tar -czf dist.tar.gz dist
echo "Archive créée : dist.tar.gz"

echo "Déploiement terminé ! Vous pouvez maintenant transférer dist/ ou dist.tar.gz via SCP ou FTP."

# Rendre ce fichier exécutable avec :
# ```bash
# chmod +x deploy.sh
# ```
# Le lancer avec :
# ```bash
# ./deploy.sh
# ```