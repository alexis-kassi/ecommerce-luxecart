<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produit;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Retourne l'identifiant de session courant — utilisé comme clé de panier.
     */
    private function sessionId(): string
    {
        return session()->getId();
    }

    /**
     * Affiche le panier.
     */
    public function index()
    {
        // Nettoyage de l'ancienne clé session (format pre-DB)
        session()->forget('cart');

        $cartItems = Cart::where('session_id', $this->sessionId())
            ->with('produit')
            ->get();

        $produits = [];
        $total    = 0;

        foreach ($cartItems as $item) {
            // Sécurité : si le produit a été supprimé entre-temps, on ignore la ligne
            if (!$item->produit) {
                $item->delete();
                continue;
            }

            $subtotal  = $item->produit->prix * $item->quantite;
            $total    += $subtotal;

            $produits[] = [
                'id'        => $item->produit->id,
                'nom'       => $item->produit->nom,
                'prix'      => $item->produit->prix,
                'image'     => $item->produit->image,
                'quantite'  => $item->quantite,
                'subtotal'  => $subtotal,
                'categorie' => $item->produit->categorie,
                'stock'     => $item->produit->stock,
            ];
        }

        return view('cart', compact('produits', 'total'));
    }

    /**
     * Ajoute un produit au panier (ou incrémente la quantité s'il est déjà présent).
     */
    public function add(Request $request, $id)
    {
        Produit::findOrFail($id); // Vérifie que le produit existe
        $quantite  = max(1, (int) $request->input('quantite', 1));
        $sessionId = $this->sessionId();

        $cartItem = Cart::where('session_id', $sessionId)
            ->where('produit_id', $id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantite', $quantite);
        } else {
            Cart::create([
                'session_id' => $sessionId,
                'user_id'    => auth()->id(), // null si invité
                'produit_id' => $id,
                'quantite'   => $quantite,
            ]);
        }

        $totalCount = Cart::where('session_id', $sessionId)->sum('quantite');

        return response()->json([
            'success'   => true,
            'message'   => 'Produit ajouté au panier !',
            'cartCount' => $totalCount,
        ]);
    }

    /**
     * Met à jour la quantité d'un article du panier.
     */
    public function update(Request $request, $id)
    {
        $quantite  = (int) $request->input('quantite', 1);
        $sessionId = $this->sessionId();

        $cartItem = Cart::where('session_id', $sessionId)
            ->where('produit_id', $id)
            ->first();

        if ($cartItem) {
            if ($quantite > 0) {
                $cartItem->update(['quantite' => $quantite]);
            } else {
                $cartItem->delete();
            }
        }

        return redirect()->route('cart.index')->with('success', 'Panier mis à jour.');
    }

    /**
     * Supprime un article du panier.
     */
    public function remove($id)
    {
        Cart::where('session_id', $this->sessionId())
            ->where('produit_id', $id)
            ->delete();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Produit retiré du panier.',
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produit retiré du panier.');
    }

    /**
     * Retourne le nombre d'articles dans le panier (pour la navbar).
     */
    public function getCount()
    {
        $count = Cart::where('session_id', $this->sessionId())->sum('quantite');
        return response()->json(['count' => $count]);
    }
}

