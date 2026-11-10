<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Avis;
class ProduitController extends Controller
{
    /**
     * Page d'accueil avec produits vedettes.
     */
    public function home(Request $request)
    {
        // Création de nouveaux produits
        // Nouveaux produits
        // Migration cers la base de données
        if (!Produit::where('image', 'images/claquettes.jpg')->exists()) {
            Produit::create([
                'nom' => 'Claquettes Ergonomiques Confort',
                'description' => 'Claquettes légères et stylées avec semelle amortissante antidérapante, confort absolu au quotidien.',
                'prix' => 15000,
                'stock' => 12,
                'categorie' => 'Chaussure',
                'image' => 'images/claquettes.jpg'
            ]);
        }

        if (!Produit::where('image', 'like', '%mixer%')->exists()) {
            Produit::create([
                'nom' => 'Mixeur Blender Électrique Inox',
                'description' => 'Mixeur blender haute performance en acier inoxydable avec bol gradué et lames ultra-résistantes.',
                'prix' => 38000,
                'stock' => 8,
                'categorie' => 'Électronique',
                'image' => 'images/mixer.jpg'
            ]);
        }

        if (!Produit::where('image', 'like', '%ceinture%')->exists()) {
            Produit::create([
                'nom' => 'Ceinture en Cuir Véritable',
                'description' => 'Ceinture élégante en cuir véritable avec boucle en métal brossé, finitions soignées pour costume ou tenue casual.',
                'prix' => 18000,
                'stock' => 10,
                'categorie' => 'Accessoires Mode',
                'image' => 'images/ceinture.jpg'
            ]);
        }

        if (!Produit::where('image', 'like', '%mocassins%')->exists()) {
            Produit::create([
                'nom' => 'Mocassins en Cuir Élégance',
                'description' => 'Mocassins raffinés en cuir véritable avec semelle cousue main, alliant élégance italienne et confort absolu.',
                'prix' => 35000,
                'stock' => 8,
                'categorie' => 'Chaussure',
                'image' => 'images/mocassins.jpg'
            ]);
        }

        if (!Produit::where('image', 'like', '%sneakers%')->exists()) {
            Produit::create([
                'nom' => 'Sneakers Blanches Minimalistes',
                'description' => 'Baskets basses épurées en cuir doux avec semelle renforcée, idéales pour un look urbain et contemporain.',
                'prix' => 25000,
                'stock' => 14,
                'categorie' => 'Chaussure',
                'image' => 'images/sneakers.jpg'
            ]);
        }

        if (!Produit::where('image', 'like', '%chelsea%')->exists()) {
            Produit::create([
                'nom' => 'Bottines Chelsea en Cuir',
                'description' => 'Bottines élégantes en cuir noir avec élastiques latéraux et semelle crantée, alliance parfaite de style et robustesse.',
                'prix' => 42000,
                'stock' => 6,
                'categorie' => 'Chaussure',
                'image' => 'images/chelsea_boots.jpg'
            ]);
        }


        $validated = $request->validate([
            'search'    => 'nullable|string|max:255',
            'category'  => 'nullable|string|max:100',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',
            'sort'      => 'nullable|in:price_asc,price_desc',
        ]);

        $category = $validated['category'] ?? $request->query('category');
        $search   = $validated['search'] ?? null;

        if ($category) {
            $produits = Produit::where('categorie', $category)->take(20)->get();
        } else {
            $produits = Produit::latest()->take(8)->get();
        }

        // Offres du jour : 3 produits avec stock disponible
        $featuredIds = $produits->pluck('id')->toArray();
        $offresDuJour = Produit::whereNotIn('id', $featuredIds)
            ->where('stock', '>', 0)
            ->inRandomOrder()
            ->take(3)
            ->get();

        if ($offresDuJour->count() < 3) {
            $offresDuJour = Produit::where('stock', '>', 0)->take(3)->get();
        }

        return view('welcome', compact('produits', 'category', 'offresDuJour'));
    }

    /**
     * Page Boutique avec filtres complets.
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'search'    => 'nullable|string|max:255',
            'category'  => 'nullable|string|max:100',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',
            'sort'      => 'nullable|string|in:latest,price_asc,price_desc,name_asc,name_desc,popular',
            'in_stock'  => 'nullable|in:0,1,true,false',
            'per_page'  => 'nullable|integer|in:6,9,12,18,24,36',
        ]);

        $query = Produit::query();

        // Filtre par recherche (nom OU description)
        if (!empty($validated['search'])) {
            $search = trim($validated['search']);
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Filtre par catégorie
        if (!empty($validated['category'])) {
            $query->where('categorie', $validated['category']);
        }

        // Filtre par prix min
        if (!empty($validated['min_price'])) {
            $query->where('prix', '>=', $validated['min_price']);
        }

        // Filtre par prix max
        if (!empty($validated['max_price'])) {
            $query->where('prix', '<=', $validated['max_price']);
        }

        // Filtre disponibilité (en stock)
        if (!empty($validated['in_stock']) && in_array($validated['in_stock'], ['1', 'true', true], true)) {
            $query->where('stock', '>', 0);
        }

        // Tri
        $sort = $validated['sort'] ?? 'latest';
        if ($sort === 'price_asc') {
            $query->orderBy('prix', 'asc');
        } elseif ($sort === 'price_desc') {
            $query->orderBy('prix', 'desc');
        } elseif ($sort === 'name_asc') {
            $query->orderBy('nom', 'asc');
        } elseif ($sort === 'name_desc') {
            $query->orderBy('nom', 'desc');
        } else {
            $query->latest();
        }

        $perPage = (int) ($validated['per_page'] ?? 12);
        $produits = $query->paginate($perPage)->withQueryString();

        // Statistiques globales pour la boutique
        $totalProductsCount = Produit::count();
        $categories = Produit::select('categorie', DB::raw('count(*) as count'))
            ->groupBy('categorie')
            ->orderBy('categorie', 'asc')
            ->get();

        $minPriceDb = (int) (Produit::min('prix') ?? 0);
        $maxPriceDb = (int) (Produit::max('prix') ?? 100000);

        // Réponse AJAX pour la recherche en direct et le filtrage dynamique
        if ($request->ajax() || $request->wantsJson() || $request->header('X-Live-Search')) {
            return response()->json([
                'success'   => true,
                'total'     => $produits->total(),
                'firstItem' => $produits->firstItem() ?? 0,
                'lastItem'  => $produits->lastItem() ?? 0,
                'count'     => count($produits),
                'html'      => view('produits.partials.products_grid', compact('produits'))->render(),
            ]);
        }

        return view('produits.index', compact(
            'produits',
            'categories',
            'totalProductsCount',
            'minPriceDb',
            'maxPriceDb'
        ));
    }

    public function show( int $id, Request $request)
    {
        $produit = Produit::findOrFail($id);

        if ($request->wantsJson() || $request->ajax() || $request->query('format') === 'json') {
            return response()->json([
                'success' => true,
                'produit' => [
                    'id' => $produit->id,
                    'nom' => $produit->nom,
                    'description' => $produit->description,
                    'prix' => $produit->prix,
                    'prix_formate' => number_format($produit->prix, 0, ',', ' ') . ' FCFA',
                    'stock' => $produit->stock,
                    'categorie' => $produit->categorie,
                    'image' => asset($produit->image ?? 'images/placeholder-product.jpg'),
                    'url' => route('products.show', $produit->id),
                    'is_favorite' => isset(session('wishlist', [])[$produit->id])
                ]
            ]);
        }

        // Avis validés + statistiques
        $avis = Avis::where('produit_id', $id)
            ->where('valide', true)
            ->latest()
            ->get();

        $avgNote     = $avis->count() ? round($avis->avg('note'), 1) : null;
        $totalAvis   = $avis->count();

        // Répartition par étoile (5→1)
        $repartition = [];
        for ($i = 5; $i >= 1; $i--) {
            $repartition[$i] = $avis->where('note', $i)->count();
        }

        // L'utilisateur a-t-il déjà laissé un avis ?
        $dejaAvis = Avis::where('produit_id', $id)
            ->where('session_id', session()->getId())
            ->exists();

        return view('produits.show', compact(
            'produit', 'avis', 'avgNote', 'totalAvis', 'repartition', 'dejaAvis'
        ));
    }

    /**
     * Page Nouveautés avec mise en avant des dernières collections.
     */
    public function nouveautes(Request $request)
    {
        $category = $request->query('category');
        $sort     = $request->query('sort', 'latest');
        $search   = $request->query('search');

        $query = Produit::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if (!empty($category) && $category !== 'all') {
            $query->where('categorie', $category);
        }

        // Tri
        if ($sort === 'price_asc') {
            $query->orderBy('prix', 'asc');
        } elseif ($sort === 'price_desc') {
            $query->orderBy('prix', 'desc');
        } elseif ($sort === 'name_asc') {
            $query->orderBy('nom', 'asc');
        } else {
            $query->latest();
        }

        $produits = $query->get();

        // Récupération des catégories pour les onglets
        $categories = Produit::select('categorie', DB::raw('count(*) as count'))
            ->whereNotNull('categorie')
            ->where('categorie', '!=', '')
            ->groupBy('categorie')
            ->orderBy('categorie', 'asc')
            ->get();

        // Produit coup de coeur spotlight
        $spotlight = $produits->first();

        return view('nouveautes', compact('produits', 'categories', 'category', 'sort', 'search', 'spotlight'));
    }
}
