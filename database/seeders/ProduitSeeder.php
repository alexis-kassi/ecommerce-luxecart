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
            'nom' => 'T-shirt',
            'description' => 'T-shirt en coton très solid',
            'prix' => 5000,
            'stock' => 8,
            'categorie' => 'Vêtement',
            'image' => 'images/imgTshirt.jpg'
        ]);

        Produit::create([
            'nom' => 'Chemise',
            'description' => 'Chemise solide à base du conton',
            'prix' => 6000,
            'stock' => 12,
            'categorie' => 'Vêtement',
            'image' => 'images/imgChemise.jpg'
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
    }
}
