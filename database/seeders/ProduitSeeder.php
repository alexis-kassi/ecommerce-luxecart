<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // PRODUITS RECENTS
    public function run(): void
    {
        Produit::create([
            'nom' => 'Téléphone',
            'description' => 'Smartphone performant',
            'prix' => 150000,
            'stock' => 10,
            'categorie' => 'Électronique',
            'image' => 'images/imgTelephone1.jpg'
        ]);

        Produit::create([
            'nom' => 'Ordinateur',
            'description' => 'PC portable rapide',
            'prix' => 350000,
            'stock' => 5,
            'categorie' => 'Électronique',
            'image' => 'images/imgOrdinateur1.jpg'
        ]);

        Produit::create([
            'nom' => 'Casque Audio Sans Fil',
            'description' => 'Casque Bluetooth haute fidélité avec réduction active de bruit.',
            'prix' => 75000,
            'stock' => 8,
            'categorie' => 'Électronique',
            'image' => 'images/imgCasqueAudio.jpg'
        ]);

        Produit::create([
            'nom' => 'Tablette Tactile Pro',
            'description' => 'Tablette tactile ultra-fine avec écran haute définition et stylet.',
            'prix' => 220000,
            'stock' => 6,
            'categorie' => 'Électronique',
            'image' => 'images/imgTablette.jpg'
        ]);

        Produit::create([
            'nom' => 'Enceinte Bluetooth',
            'description' => 'Enceinte sans fil compacte, son immersif à 360° et grande autonomie.',
            'prix' => 45000,
            'stock' => 12,
            'categorie' => 'Électronique',
            'image' => 'images/imgEnceinte.jpg'
        ]);

        Produit::create([
            'nom' => 'Montre de Luxe',
            'description'=> 'Une montre élégante pour toutes occasions, déjà disponible pour vous.',
            'prix' => '120000',
            'stock' => '6',
            'categorie'=> 'Accessoires Mode',
            'image' => 'images/imgMontre.jpg'
        ]);

        Produit::create([
            'nom' => 'Montre Connectée',
            'description' => 'Une montre connectée très performante',
            'prix' => '145000',
            'stock' => '5',
            'categorie' => 'Accessoires Mode',
            'image' => 'images/imgMontreConnectee.jpg'
        ]);

        Produit::create([
            'nom' => 'Sac à main homme',
            'description' => 'Sac à main très complet',
            'prix' => '30000',
            'stock' => '7',
            'categorie' => 'Accessoires Mode',
            'image' => 'images/imgSacAMainHomme.jpg'
        ]);

        Produit::create([
            'nom' => 'Sac à main Dame',
            'description' => 'Sac à main Dame, disponible pour vous, très solide et très pratique',
            'prix' => '32000',
            'stock' => '4',
            'categorie' => 'Accessoires Mode',
            'image' => 'images/imgSacAMainDame.jpg'
        ]);

        Produit::create([
            'nom' => 'Sac à dos',
            'description' => 'Sac à dos disponible pour vous, bien solide et très pratique.',
            'prix' => '45000',
            'stock' => '7',
            'categorie' => 'Accessoires Mode',
            'image' => 'images/imgSacADos.jpg'
        ]);
        Produit::create([
            'nom' => 'T-shirt',
            'description' => 'T-shirt en coton très solid',
            'prix' => 5000,
            'stock' => 8,
            'categorie' => 'Vêtement',
            'image' => 'images/imgTshirt.jpg'
        ]);

        Produit::create([
            'nom' => 'Chemise',
            'description' => 'Chemise solide à base du coton',
            'prix' => 6000,
            'stock' => 12,
            'categorie' => 'Vêtement',
            'image' => 'images/imgChemise.jpg'
        ]);

        Produit::create([
            'nom' => 'Pull en Laine',
            'description' => 'Pull en laine premium, chaud et confortable, idéal pour les soirées fraîches.',
            'prix' => 18000,
            'stock' => 10,
            'categorie' => 'Vêtement',
            'image' => 'images/imgPull.jpg'
        ]);

        Produit::create([
            'nom' => 'Pantalon Chino',
            'description' => 'Pantalon chino slim fit, coupe moderne et élégante, parfait pour toutes occasions.',
            'prix' => 15000,
            'stock' => 8,
            'categorie' => 'Vêtement',
            'image' => 'images/imgPantalon.jpg'
        ]);

        Produit::create([
            'nom' => 'Short Casual',
            'description' => 'Short décontracté en coton léger, confortable pour l\'été.',
            'prix' => 8000,
            'stock' => 15,
            'categorie' => 'Vêtement',
            'image' => 'images/imgShort.jpg'
        ]);

        Produit::create([
            'nom' => 'Robe de Soirée',
            'description' => 'Robe de soirée élégante, tissu fluide et raffiné, parfaite pour toutes vos occasions spéciales.',
            'prix' => 35000,
            'stock' => 6,
            'categorie' => 'Vêtement',
            'image' => 'images/imgRobe.jpg'
        ]);


        Produit::create([
            'nom' => ' Chaussure Nike',
            'description' => 'Chaussure Nike très solide',
            'prix' => 20000,
            'stock' => 10,
            'categorie' => 'Chaussure',
            'image' => 'images/imgChaussureNike.jpg'
        ]);

        Produit::create([
            'nom' => 'Chaussure adidas',
            'description' => 'Chaussure Nike très solide',
            'prix' => 22000,
            'stock' => 15,
            'categorie' => 'Chaussure',
            'image' => 'images/imgChaussureAdidas.jpg'
        ]);

        // LES NOUVEAUX PRODUITS
        Produit::create([
            'nom' => 'lunette',
            'description' => 'Structure tenant les verres, fabriquée en métal, plastique (acétate) ou matériaux mixtes.',
            'prix' => 35000,
            'stock'=> 5,
            'categorie' => 'Nouveautés',
            'image' => 'images/lunette1.jpg',
        ]);

         Produit::create([
            'nom' => 'lunette',
            'description' => 'Structure tenant les verres, fabriquée en métal, plastique (acétate) ou matériaux mixtes.',
            'prix' => 34000,
            'stock'=> 3,
            'categorie' => 'Nouveautés',
            'image' => 'images/lunette2.jpg',
        ]);

        Produit::create([
            'nom' => 'Portefeuille',
            'description' => 'Un portefeuille très spacieux et solide',
            'prix' => 4000,
            'stock' => 3,
            'categorie' => 'Nouveautés',
            'image' => 'images/portf1.jpg',
        ]);

        Produit::create([
            'nom' => 'Portefeuille',
            'description' => 'Un portefeuille très spacieux et solide',
            'prix' => 4500,
            'stock' => 3,
            'categorie' => 'Nouveautés',
            'image' => 'images/portf2.jpg',
        ]);

        Produit::create([
            'nom' => 'Claquettes Ergonomiques Confort',
            'description' => 'Claquettes légères et stylées avec semelle amortissante antidérapante, confort absolu au quotidien.',
            'prix' => 15000,
            'stock' => 12,
            'categorie' => 'Chaussure',
            'image' => 'images/claquettes.jpg'
        ]);

        Produit::create([
            'nom' => 'Mixeur Blender Électrique Inox',
            'description' => 'Mixeur blender haute performance en acier inoxydable avec bol gradué et lames ultra-résistantes.',
            'prix' => 38000,
            'stock' => 8,
            'categorie' => 'Électronique',
            'image' => 'images/mixer.jpg'
        ]);

    }
}
