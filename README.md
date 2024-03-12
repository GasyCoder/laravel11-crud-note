# Simple CRUD d'ajout de notes avec Laravel 11

Une application simple de gestion de notes personnelles développée avec Laravel, permettant de s'inscrire, de se connecter et de créer des notes personnelles.

## Installation

1. Cloner le projet
2. Naviguer vers le répertoire racine du projet en utilisant le terminal
3. Créer le fichier `.env` en dupliquant `.env.example` : 
    ```bash
    cp .env.example .env
    ```
4. Installer les dépendances PHP avec Composer :
    ```bash
    composer install
    ```
5. Installer les dépendances JavaScript avec npm :
    ```bash
    npm install
    ```
6. Générer la clé d'application :
    ```bash
    php artisan key:generate --ansi
    ```
7. Exécuter les migrations et insérer les données de base :
    ```bash
    php artisan migrate --seed
    ```
8. Démarrer le serveur Vite :
    ```bash
    npm run dev
    ```
9. Démarrer le serveur Artisan :
    ```bash
    php artisan serve
    ```

Vous êtes prêt à utiliser l'application localhost:8000!