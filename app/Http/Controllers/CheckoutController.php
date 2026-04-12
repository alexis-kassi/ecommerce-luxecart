<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        $items = [];
        $total = 0;
        
        $ids = array_keys($cart);
        $produits_db = Produit::whereIn('id', $ids)->get();

        foreach ($produits_db as $produit) {
            $quantite = $cart[$produit->id];
            $subtotal = $produit->prix * $quantite;
            $total += $subtotal;
            $items[] = [
                'produit' => $produit,
                'quantite' => $quantite,
                'subtotal' => $subtotal
            ];
        }

        return view('checkout', compact('items', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:500',
            'ville' => 'required|string|max:100',
            'methode_paiement' => 'required|string'
        ]);

        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'Panier vide.');
        }

        try {
            DB::beginTransaction();

            // Calculate total again for security
            $total = 0;
            $ids = array_keys($cart);
            $produits_db = Produit::whereIn('id', $ids)->get();
            
            $order = Order::create([
                'nom' => $request->nom,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'adresse' => $request->adresse,
                'ville' => $request->ville,
                'methode_paiement' => $request->methode_paiement,
                'total' => 0, // Placeholder
                'statut' => 'en_attente'
            ]);

            foreach ($produits_db as $produit) {
                $quantite = $cart[$produit->id];
                $subtotal = $produit->prix * $quantite;
                $total += $subtotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'produit_id' => $produit->id,
                    'quantite' => $quantite,
                    'prix_unitaire' => $produit->prix
                ]);
            }

            // Update total
            $order->update(['total' => $total]);

            DB::commit();

            // Clear Cart
            session()->forget('cart');

            return redirect()->route('checkout.success', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la commande : ' . $e->getMessage());
        }
    }

    public function success($id)
    {
        $order = Order::findOrFail($id);
        return view('success', compact('order'));
    }
}
