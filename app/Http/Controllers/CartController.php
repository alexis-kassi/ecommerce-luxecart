<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // Données promo (depuis la session)
        $promoCode     = session('promo_code');
        $promoLabel    = session('promo_label');
        $promoDiscount = (float) session('promo_discount', 0);
        $totalFinal    = max(0, $total - $promoDiscount);

        return view('cart', compact(
            'produits', 'total',
            'promoCode', 'promoLabel', 'promoDiscount', 'totalFinal'
        ));
    }

    /**
     * Ajoute un produit au panier (ou incrémente la quantité s'il est déjà présent).
     *
     * - Requête AJAX / JSON  => réponse JSON
     * - Formulaire classique => retour à la page précédente avec un message
     */
    public function add(Request $request, $id): JsonResponse|RedirectResponse
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
                'produit_id' => $id,
                'user_id' => Auth::id(),  
                'quantite'   => $quantite,
            ]);
        }

        $totalCount = (int) Cart::where('session_id', $sessionId)->count();
        $message    = 'Produit ajouté au panier !';

        if ($request->expectsJson()) {
            return response()->json([
                'success'   => true,
                'message'   => $message,
                'cartCount' => $totalCount,
            ]);
        }

        return back()->with('success', $message);
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
    public function remove(Request $request, $id)
    {
        Cart::where('session_id', $this->sessionId())
            ->where('produit_id', $id)
            ->delete();

        if ($request->expectsJson()) {
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
        $count = (int) Cart::where('session_id', $this->sessionId())->count();  
        return response()->json(['count' => $count]);
    }
}