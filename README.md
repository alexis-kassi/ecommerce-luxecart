# LuxeCart - Boutique E-commerce Premium 🛍️

LuxeCart est une plateforme e-commerce moderne et élégante développée avec **Laravel**. Conçue pour offrir une expérience utilisateur premium, elle combine un design épuré, des performances fluides grâce à l'AJAX et un système complet de gestion des ventes.

## ✨ Fonctionnalités Clés

### 🏠 Vitrine & Produits
- **Page d'Accueil Dynamique** : Mise en avant des produits vedettes et des catégories.
- **Catalogue Complet** : Une page boutique dédiée avec recherche en temps réel et filtres avancés (Catégorie, Prix).
- **Vue Détaillée** : Fiche produit complète avec gestion des stocks et galerie.

### 🛒 Expérience Shopping
- **Panier AJAX** : Ajout et mise à jour des produits sans rechargement de page.
- **Tunnel de Commande (Checkout)** : Processus de commande fluide avec enregistrement en base de données.
- **Espace Client** : Système d'authentification complet (Inscription, Connexion, Profil).

### 🛠️ Support & Marketing
- **Newsletter Fonctionnelle** : Inscription par email avec validation AJAX.
- **Assistance** : Pages FAQ interactive et "À Propos" détaillant l'histoire de l'entreprise.
- **Design Responsive** : Optimisé pour PC, Tablettes et Smartphones.

## 🚀 Installation & Configuration

### Pré-requis
- PHP >= 8.2
- Composer
- MySQL (via XAMPP par exemple)
- Node.js & NPM

### Étapes d'installation
1. **Cloner le projet**
   ```bash
   git clone https://github.com/alexis-kassi/ecommerce-luxecart.git
   cd ecommerce-luxecart
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   npm install
   ```

3. **Environnement**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Note: Pensez à configurer les accès à votre base de données dans le fichier `.env`.*

4. **Base de données & Données de test**
   ```bash
   php artisan migrate --seed
   ```

5. **Lancer le projet**
   ```bash
   # Terminal 1
   php artisan serve

   # Terminal 2 (pour le CSS/JS)
   npm run dev
   ```

## 🛠️ Stack Technique
- **Framework** : [Laravel 12](https://laravel.com)
- **Langages** : PHP (Backend), Blade (Templates)
- **Style** : Vanilla CSS (Design système personnalisé)
- **Interactivité** : JavaScript (Vanilla/AJAX fetch)
- **Base de données** : MySQL

---
Développé avec ❤️ pour **LuxeCart Côte d'Ivoire**.
