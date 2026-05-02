<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Index controller
    public function index()
    {
        $cart = session()->get('cart', []);
        $produits = [];
        $total = 0;

        if (!empty($cart)) {
            $ids = array_keys($cart);
            $produits_db = Produit::whereIn('id', $ids)->get();

            foreach ($produits_db as $produit) {
                $quantite = $cart[$produit->id];
                $subtotal = $produit->prix * $quantite;
                $total += $subtotal;

                $produits[] = [
                    'id' => $produit->id,
                    'nom' => $produit->nom,
                    'prix' => $produit->prix,
                    'image' => $produit->image,
                    'quantite' => $quantite,
                    'subtotal' => $subtotal
                ];
            }
        }

        return view('cart', compact('produits', 'total'));
    }

    public function add(Request $request, $id)
    {
        $produit = Produit::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        session()->put('cart', $cart);

        $totalCount = array_sum($cart);

        return response()->json([
            'success' => true,
            'message' => 'Produit ajouté au panier !',
            'cartCount' => $totalCount
        ]);
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $quantite = $request->input('quantite', 1);
            if ($quantite > 0) {
                $cart[$id] = $quantite;
            } else {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Panier mis à jour.');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produit retiré du panier.');
    }

    public function getCount()
    {
        $cart = session()->get('cart', []);
        return response()->json(['count' => array_sum($cart)]);
    }
}
