<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Page d'accueil avec produits vedettes.
     */
    public function home(Request $request)
    {
        $category = $request->query('category');
        
        if ($category) {
            $produits = Produit::where('categorie', $category)->get();
        } else {
            // Sur l'accueil, on peut choisir d'afficher seulement 8 produits par exemple
            $produits = Produit::take(8)->get();
        }

        return view('welcome', compact('produits', 'category'));
    }

    /**
     * Page Boutique avec filtres complets.
     */
    public function index(Request $request)
    {
        $query = Produit::query();

        // Filtre par recherche
        if ($request->filled('search')) {
            $query->where('nom', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Filtre par catégorie
        if ($request->filled('category')) {
            $query->where('categorie', $request->category);
        }

        // Filtre par prix min
        if ($request->filled('min_price')) {
            $query->where('prix', '>=', $request->min_price);
        }

        // Filtre par prix max
        if ($request->filled('max_price')) {
            $query->where('prix', '<=', $request->max_price);
        }

        // Tri
        if ($request->sort == 'price_asc') {
            $query->orderBy('prix', 'asc');
        } elseif ($request->sort == 'price_desc') {
            $query->orderBy('prix', 'desc');
        } else {
            $query->latest();
        }

        $produits = $query->get();
        
        // Liste des catégories pour la sidebar
        $categories = Produit::select('categorie')->distinct()->get();

        return view('produits.index', compact('produits', 'categories'));
    }

    public function show($id)
    {
        $produit = Produit::findOrFail($id);
        return view('produits.show', compact('produit'));
    }
}
