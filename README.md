# Mon Projet CIEL-2 : Dos_Etu (GTB ou CO)

[![Platform](https://img.shields.io/badge/platform-MacOS%20%7C%20Linux%20%7C%20Windows-lightgrey)]()
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Python](https://img.shields.io/badge/Python-3.9%2B-blue?logo=python)](https://www.python.org/)
[![PHP](https://img.shields.io/badge/PHP-%3E%3D7.4-blueviolet)]()
[![MySQL](https://img.shields.io/badge/MySQL-%3E%3D5.7-orange)]()
![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-yellow?logo=javascript)

[![Status](https://img.shields.io/badge/Status-En%20développement-yellow)]()
![GitHub repo size](https://img.shields.io/github/repo-size/boudjelaba/CIEL2)
![GitHub issues](https://img.shields.io/github/issues/boudjelaba/Dos_Etu)
![GitHub pull requests](https://img.shields.io/github/issues-pr/boudjelaba/Dos_Etu)
![GitHub last commit](https://img.shields.io/github/last-commit/boudjelaba/Dos_Etu)
![Build](https://img.shields.io/badge/build-passing-brightgreen)

> Un projet modulaire pour tester, analyser et développer des solutions innovantes.

[![Use this template](https://img.shields.io/badge/GitHub-Use%20this%20template-brightgreen?logo=github)](https://github.com/boudjelaba/Dos_Etu/generate)

---

## 🗂️ Sommaire

<!-- TOC START -->
- [Mon Projet CIEL-2 (GTB ou CO)](#mon-projet-ciel-2-gtb-ou-co)
  - [🗂️ Sommaire](#️-sommaire)
  - [📋 Objectifs](#-objectifs)
  - [📁 Structure du projet](#-structure-du-projet)
  - [Gestion des fichiers temporaires et sensibles](#gestion-des-fichiers-temporaires-et-sensibles)
    - [1. **Fichiers `.DS_Store` à supprimer** (Pour ceux qui travaillent avec un Mac)](#1-fichiers-ds_store-à-supprimer-pour-ceux-qui-travaillent-avec-un-mac)
    - [2. Fichier `.gitignore`](#2-fichier-gitignore)
  - [🔒 3. Sécurité avec `.htaccess`](#-3-sécurité-avec-htaccess)
    - [Dans `config/`](#dans-config)
    - [À la racine](#à-la-racine)
  - [4. Déploiement avec (`deploy.sh`)](#4-déploiement-avec-deploysh)
    - [➤ Utilisation](#-utilisation)
    - [Script `deploy.sh` (à lancer depuis la racine)](#script-deploysh-à-lancer-depuis-la-racine)
  - [Installation](#installation)
  - [Contribution](#contribution)
    - [Création du dépôt GitHub](#création-du-dépôt-github)
      - [À venir](#à-venir)
  - [Licence](#licence)
  - [✅ Bonnes pratiques](#-bonnes-pratiques)
  - [Automatisation du sommaire](#automatisation-du-sommaire)
    - [🔧 Utilisation](#-utilisation-1)
<!-- TOC END -->

---

## 📋 Objectifs

- Concevoir des environnements modulaires et reproductibles.
- Explorer et intégrer des approches innovantes.
- Offrir un cadre de prototypage rapide, configurable et évolutif.

---

## 📁 Structure du projet

```markdown
📦CO_GTB
 ┣ 📂admin
 ┃ ┣ 📂actions
 ┃ ┃ ┗ 📜add_user.php
 ┃ ┣ 📜admin_panel.php
 ┃ ┗ 📜index.php
 ┣ 📂config
 ┃ ┣ 📜.htaccess
 ┃ ┣ 📜auth.php
 ┃ ┣ 📜db.php
 ┃ ┣ 📜db.sample.php
 ┃ ┗ 📜import_db.php
 ┣ 📂public
 ┃ ┣ 📂assets
 ┃ ┃ ┣ 📂css
 ┃ ┃ ┃ ┗ 📜style.css
 ┃ ┃ ┣ 📂img
 ┃ ┃ ┣ 📂js
 ┃ ┃ ┗ ┗ 📜script.js
 ┃ ┣ 📂login
 ┃ ┃ ┣ 📜login.php
 ┃ ┃ ┣ 📜logout.php
 ┃ ┃ ┗ 📜register.php
 ┃ ┣ 📜dashboard.php
 ┃ ┗ 📜index.php
 ┣ 📂sql
 ┃ ┣ 📜db.sample.sql
 ┃ ┗ 📜db.sql
 ┣ 📂views
 ┃ ┣ 📜footer.php
 ┃ ┣ 📜header.php
 ┃ ┗ 📜sidebar.php
 ┣ 📜.DS_Store
 ┣ 📜.gitignore
 ┣ 📜.htaccess
 ┣ 📜deploy.sh
 ┣ 📜generate_toc.py
 ┣ 📜readme.md
 ┗ 📜requirements.txt
```

---

## Gestion des fichiers temporaires et sensibles

### 1. **Fichiers `.DS_Store` à supprimer** (Pour ceux qui travaillent avec un Mac)

Les fichiers `.DS_Store` sont générés par macOS et n'ont aucune utilité dans le projet. Pour les supprimer et les ignorer dans Git :

```bash
find . -name ".DS_Store" -delete
```

Et ajouter dans `.gitignore` :

```bash
.DS_Store
```

---

### 2. Fichier `.gitignore` 

Le fichier `.gitignore` permet d’exclure du dépôt Git les fichiers sensibles ou inutiles (ex : `config/db.php`, `.DS_Store`, fichiers de logs, etc.).

Exemple à placer à la racine du projet :

```gitignore
# Fichiers systèmes
.DS_Store
Thumbs.db

# Environnements d'IDE
.vscode/
.idea/

# Dossiers sensibles ou inutiles pour le dépôt
logs/
dist/

# Fichiers de config personnels
config/db.php
config/*.local.php

# Fichiers temporaires
*.log
*.bak
*.tmp
*.swp

# Dump SQL local
*.sql

# Fichiers de déploiement
deploy.sh
```

---

## 🔒 3. Sécurité avec `.htaccess` 

### Dans `config/`

Bloque l’accès aux fichiers sensibles :

```apache
<FilesMatch "\.(php|ini|sql|bak)$">
  Order allow,deny
  Deny from all
</FilesMatch>
```

### À la racine

Désactive l’indexation automatique des répertoires :

```apache
Options -Indexes
```

---

## 4. Déploiement avec (`deploy.sh`) 

Le dossier `dist/` généré par le script `deploy.sh` sert à contenir la version Le script `deploy.sh` permet de préparer une version propre et sécurisée du projet pour la production.

- Crée un dossier `dist/` contenant uniquement les fichiers nécessaires.
- Ignore les fichiers sensibles ou inutiles.
- Peut compresser en `.tar.gz` le dossier pour faciliter le transfert.

### ➤ Utilisation

Rendre le script exécutable :

```bash
chmod +x deploy.sh
```

Lancer le script :

```bash
./deploy.sh
```

---

**Résultat**  

| Type de fichier         | Contenu réel       | Version suivie par Git    | Version visible en prod   |
|-------------------------|--------------------|---------------------------|----------------------------|
| `config/db.php`         | mot de passe réel  | ❌ non (via `.gitignore`) | ✅ oui (en ligne)          |
| `config/db.sample.php`  | structure vide     | ✅ oui                    | ❌ non (juste pour dev)    |
| `.DS_Store`, `*.log`    | bruit système      | ❌ non                    | ❌ non                    |
| `.htaccess`             | règles de sécurité | ✅ oui                    | ✅ oui (active sur Apache) |

---

### Script `deploy.sh` (à lancer depuis la racine)

Ce script :

- Crée un dossier `dist/`
- Copie les fichiers utiles
- Ignore les fichiers sensibles ou inutiles
- Peut être enrichi pour envoyer le tout en FTP ou SSH

```bash
#!/bin/bash

echo "Déploiement en cours..."

# Vérification de la présence de rsync
if ! command -v rsync &> /dev/null
then
    echo "Erreur : rsync n'est pas installé. Veuillez l'installer pour continuer."
    exit 1
fi

# Nettoyage du dossier précédent
if [ -d "dist" ]; then
    rm -rf dist || { echo "Erreur : Impossible de supprimer l'ancien dossier dist."; exit 1; }
fi
mkdir dist || { echo "Erreur : Impossible de créer le dossier dist."; exit 1; }

# Copie des fichiers principaux (en respectant les exclusions)
rsync -av --exclude='.git' \
          --exclude='.DS_Store' \
          --exclude='*.log' \
          --exclude='config/db.php' \
          --exclude='deploy.sh' \
          ./ dist/ || { echo "Erreur : Échec de la copie des fichiers."; exit 1; }

echo "Fichiers copiés dans /dist"

# Ajouter éventuellement une version prod de .htaccess
cp .htaccess dist/.htaccess || { echo "Erreur : Impossible de copier le fichier .htaccess."; exit 1; }

# (Optionnel) Compression du dossier dist
tar -czvf dist.tar.gz dist/ || { echo "Erreur : Impossible de compresser le dossier dist."; exit 1; }

echo "📁 Structure de prod prête dans /dist"
echo "Dossier compressé en dist.tar.gz"
echo "On peut maintenant envoyer le dossier via scp ou FTP."
```

On rend ce fichier exécutable avec :

```bash
chmod +x deploy.sh
```

Et on le lance avec :

```bash
./deploy.sh
```

---

## Installation

1. Cloner le dépôt et installer les dépendances :

```bash
git clone https://github.com/MonGitHub/CO_GTB.git
cd CO_GTB
pip install -r requirements.txt
```

2. Configurer la base de données :
   - Importer le fichier `db.sql` dans la base de données MySQL.
   - Modifier le fichier `config/db.php` avec les vraies informations de connexion.
  
3. Ou
   - Copier `db.sample.php` → `db.php` et renseigner vos accès MySQL
   - Puis lancer : 
      ```bash
      php config/import_db.php
      ```

    > Cela importe `db.sample.sql` dans la base.

> Ces scripts facilitent l’expérimentation sans configuration complexe.

---

## Contribution

Les contributions sont les bienvenues ! Veuillez soumettre une *pull request* ou ouvrir une *issue* pour signaler des problèmes.

1. **Fork** le repo
2. Crée une nouvelle branche : `git checkout -b ma-feature`
3. Fais tes modifications (code, docs, tests…)
4. Commit : `git commit -m "Ajout de ma feature importante"`
5. Push ta branche : `git push origin ma-feature`
6. Ouvre une **pull request**


### Création du dépôt GitHub

Initialiser le dépôt et le publier sur GitHub :

```bash
git init
git add .
git commit -m "Initial commit"
gh repo create mon_projet --public --source=. --remote=origin
git push -u origin main
```

#### À venir

* [ ] Ajout d'une base de données (MySQL)
* [ ] Authentification inter-services
* [ ] Intégration de tests unitaires (PHPUnit / pytest)

---

## Licence

Ce projet est sous licence MIT. Consultez le fichier `LICENSE` pour plus d'informations.

---

## ✅ Bonnes pratiques

- **Ne jamais versionner les mots de passe ou secrets** : utilisez des fichiers d’exemple (`db.sample.php`).
- **Nettoyez régulièrement les fichiers temporaires**.
- **Protégez les dossiers sensibles avec `.htaccess`**.
- **Utilisez le script de déploiement pour éviter d’exposer des fichiers inutiles ou sensibles en production**.

---

## Automatisation du sommaire

### 🔧 Utilisation

1. Enregistrer le fichier sous `generate_toc.py` dans le même dossier que le `readme.md`. (voir fichier joint)
2. Lancer-le avec :

```bash
python generate_toc.py
```

3. S'assurer d’avoir dans le `readme.md` une section avec les balises :

```bash
<!-- TOC START -->
<!-- TOC END -->
```



---
---


## Template de Projet Réseau & Développement — CIEL

[![Use this template](https://img.shields.io/badge/GitHub-Use%20this%20template-brightgreen?logo=github)](https://github.com/boudjelaba/Dos_Etu/generate)

Bienvenue ! Ce dépôt est un **template de projet** destiné aux étudiant·es CIEL (Informatique - Réseaux) dans le cadre d’un projet mêlant développement logiciel et réseau.

---

## 🎯 Objectifs pédagogiques

Ce template vise à initier les étudiant·es à :

- la gestion de projet collaboratif,
- l’organisation d’un dépôt Git/GitHub propre,
- la structuration d’un code source réutilisable,
- la documentation et le suivi de projet.

---

## 📦 Contenu du template

```bash
📁 {{ cookiecutter.nom_repo }}/
├── README.md                → Ce fichier
├── .gitignore               → Fichiers à exclure du versionnage
├── code/                    → Code source principal
│   └── main.py
├── rapport/                 → Rapport de projet
│   └── rapport_{{ cookiecutter.année_académique }}.md
├── journal/                 → Journal de bord
│   └── journal_bord.md
├── doc/                     → Documentation utilisateur
│   └── notice_utilisateur.md
```
