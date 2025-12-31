# 🎬 Projet de Gestion Cinéma - Laravel

  

## 📋 Description

Projet Laravel pour la gestion d'une base de données cinématographique avec films, acteurs et catégories.

  

## 🚀 Technologies Utilisées

- PHP 8.x avec extensions PDO MySQL

- Laravel 10.x

- **MySQL 8.x**

- **Composer**

- **Node.js** (pour les assets front-end)

  

## 📁 Structure de la Base de Données

  

### Tables Principales

1. **categories** - Catégories de films

   - `id` (PK)

   - `categorie_name` (VARCHAR)

   - `description` (TEXT)

   - `timestamps`

  

2. **films** - Films avec index sur année de sortie

   - `id` (PK)

   - `titre` (VARCHAR)

   - `description` (TEXT)

   - `annee_sortie` (YEAR) - **INDEXÉ**

   - `duree` (INT) - nullable

   - `note` (FLOAT) - nullable

   - `categorie_id` (FK → categories.id)

   - `timestamps`

  

3. **acteurs** - Acteurs

   - `id` (PK)

   - `nom` (VARCHAR)

   - `prenom` (VARCHAR)

   - `date_naissance` (DATE)

   - `timestamps`

  

4\. **acteur_film** - Table pivot (many-to-many)

   - `id` (PK)

   - `film_id` (FK → films.id)

   - `acteur_id` (FK → acteurs.id)

   - `timestamps`

   - **UNIQUE KEY** sur (`film_id`, `acteur_id`)

  

\## ⚙️ Installation

  

\### Prérequis

\- PHP 8.1+

\- MySQL 8.0+

\- Composer

\- Node.js 18+

  

\### Étapes d'Installation

  

1\. \*\*Cloner le projet\*\*

\`\`\`bash

git clone \[url-du-projet\]

cd cinema\_project

\`\`\`

  

2\. \*\*Installer les dépendances PHP\*\*

\`\`\`bash

composer install

\`\`\`

  

3\. \*\*Configurer l'environnement\*\*

\`\`\`bash

cp .env.example .env

php artisan key:generate

\`\`\`

  

4\. \*\*Configurer la base de données dans \`.env\`\*\*

\`\`\`env

DB\_CONNECTION=mysql

DB\_HOST=127.0.0.1

DB\_PORT=3306

DB\_DATABASE=cinema

DB\_USERNAME=root

DB\_PASSWORD=votre\_mot\_de\_passe

\`\`\`

  

5\. \*\*Créer la base de données MySQL\*\*

\`\`\`sql

CREATE DATABASE cinema;

\`\`\`

  

6\. \*\*Exécuter les migrations\*\*

\`\`\`bash

php artisan migrate

\`\`\`

  

7\. \*\*Installer les dépendances front-end (optionnel)\*\*

\`\`\`bash

npm install

npm run dev

\`\`\`

  

8\. \*\*Démarrer le serveur\*\*

\`\`\`bash

php artisan serve

\`\`\`

  

\## 📊 Migrations Exécutées

  

\### Liste des migrations

1\. \`create\_categories\_table\` - Table des catégories

2\. \`create\_films\_table\` - Table des films (avec index sur \`annee\_sortie\`)

3\. \`create\_acteurs\_table\` - Table des acteurs

4\. \`create\_acteur\_film\_table\` - Table pivot acteurs-films

5\. \`add\_note\_to\_films\_table\` - Ajout colonne \`note\` (float)

  

\### Commandes de migration utiles

\`\`\`bash

\# Exécuter les migrations

php artisan migrate

  

\# Vérifier l'état des migrations

php artisan migrate:status

  

\# Annuler la dernière migration

php artisan migrate:rollback --step=1

  

\# Rejouer toutes les migrations

php artisan migrate:fresh

\`\`\`

  

\## 🎯 Fonctionnalités Implémentées

  

\### Modèles Eloquent

\- \*\*Category\*\* : Relation \`hasMany\` avec Film

\- \*\*Film\*\* : 

  - Relation \`belongsTo\` avec Category

  - Relation \`belongsToMany\` avec Acteur

  - Index sur \`annee\_sortie\`

  - Accesseur pour durée formatée

\- \*\*Acteur\*\* : Relation \`belongsToMany\` avec Film

  

\### Scopes utiles

\`\`\`php

// Films par année

Film::annee(2024)->get();

  

// Films par catégorie

Film::categorie(1)->get();

\`\`\`

  

\## 🧪 Exemples d'Utilisation

  

\### Créer une catégorie

\`\`\`php

$category = Category::create(\[

    'categorie\_name' => 'Science-Fiction',

    'description' => 'Films de science-fiction'

\]);

\`\`\`

  

\### Créer un film

\`\`\`php

$film = Film::create(\[

    'titre' => 'Inception',

    'description' => 'Un voleur qui s\\'infiltre dans les rêves',

    'annee\_sortie' => 2010,

    'duree' => 148,

    'note' => 8.8,

    'categorie\_id' => 1

\]);

\`\`\`

  

\### Associer acteurs à un film

\`\`\`php

$film->acteurs()->attach(\[1, 2, 3\]);

\`\`\`

  

\### Récupérer films avec relations

\`\`\`php

$films = Film::with(\['category', 'acteurs'\])->get();

\`\`\`

  

\## 📝 API Routes (Exemple)

  

\`\`\`php

// routes/api.php

Route::apiResource('films', FilmController::class);

Route::apiResource('acteurs', ActeurController::class);

Route::apiResource('categories', CategoryController::class);

\`\`\`

  

\## 🔧 Optimisations

  

\### Index sur la base de données

\- Index sur \`films.annee\_sortie\` pour optimiser les recherches par année

\- Clé unique sur \`acteur\_film(film\_id, acteur\_id)\` pour éviter les doublons

\- Clés étrangères avec \`onDelete('cascade')\`

  

\### Casts dans les modèles

\`\`\`php

protected $casts = \[

    'annee\_sortie' => 'integer',

    'duree' => 'integer',

    'note' => 'float',

\];

\`\`\`

  

\## 🐛 Dépannage

  

\### Problème : "could not find driver"

\`\`\`bash

\# Vérifier les extensions PHP

php -m | findstr mysql

  

\# Activer dans php.ini

extension=mysqli

extension=pdo\_mysql

\`\`\`

  

\### Problème : Migration échoue

\`\`\`bash

\# Installer doctrine/dbal pour modifier les colonnes

composer require doctrine/dbal

  

\# Réinitialiser la base

php artisan migrate:fresh

\`\`\`

  

\### Problème : Service MySQL ne démarre pas

\`\`\`bash

\# Démarrer le service MySQL

net start mysql80

  

\# Ou via Services Windows

services.msc

\`\`\`

  

\## 📊 Structure des Dossiers Importants

\`\`\`

cinema\_project/

├── app/

│   ├── Models/

│   │   ├── Category.php

│   │   ├── Film.php

│   │   └── Acteur.php

│   └── Http/

│       └── Controllers/

├── database/

│   ├── migrations/

│   │   ├── create\_categories\_table.php

│   │   ├── create\_films\_table.php

│   │   ├── create\_acteurs\_table.php

│   │   ├── create\_acteur\_film\_table.php

│   │   └── add\_note\_to\_films\_table.php

│   └── seeders/

└── routes/

    └── web.php

\`\`\`

  

\## 👥 Auteur

\- \*\*Formateur\*\* : NASSIRI ILYAS

\- \*\*Filière\*\* : DEVOWFS

\- \*\*Module\*\* : Développement Back-End

\- \*\*Établissement\*\* : ISTA QUARZAZATE

  

\## 📄 License

Projet éducatif - Office de la Formation Professionnelle et de la Promotion du Travail

  

\## 🔗 Liens Utiles

\- \[Documentation Laravel\](https://laravel.com/docs)

\- \[Documentation MySQL\](https://dev.mysql.com/doc/)

\- \[PHP Documentation\](https://www.php.net/docs.php)

  

\---

  

\*\*⚠️ Note\*\* : Ce projet a été développé dans un cadre éducatif. Les données sont fictives et servent à des fins de démonstration.
