<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CheckoutController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('info', 'Veuillez vous connecter ou vous inscrire pour passer commande.');
        }

        $sessionId = session()->getId();
        $cartRows  = Cart::where('session_id', $sessionId)->with('produit')->get();

        if ($cartRows->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        $items = [];
        $total = 0;

        foreach ($cartRows as $row) {
            if (!$row->produit) continue;
            $subtotal = $row->produit->prix * $row->quantite;
            $total   += $subtotal;
            $items[]  = [
                'produit'  => $row->produit,
                'quantite' => $row->quantite,
                'subtotal' => $subtotal,
            ];
        }

        return view('checkout', compact('items', 'total'));
    }

    public function process(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour confirmer votre commande.');
        }

        $request->validate([
            'nom'              => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'telephone'        => 'required|string|max:20',
            'adresse'          => 'required|string|max:500',
            'ville'            => 'required|string|max:100',
            'methode_paiement' => 'required|string',
        ]);

        $sessionId = session()->getId();
        $cartRows  = Cart::where('session_id', $sessionId)->with('produit')->get();

        if ($cartRows->isEmpty()) {
            return redirect()->route('home')->with('error', 'Panier vide.');
        }

        try {
            DB::beginTransaction();

            $total = 0;

            $order = Order::create([
                'user_id'          => Auth::id(),
                'nom'              => $request->nom,
                'email'            => $request->email,
                'telephone'        => $request->telephone,
                'adresse'          => $request->adresse,
                'ville'            => $request->ville,
                'methode_paiement' => $request->methode_paiement,
                'total'            => 0, // recalculé ci-dessous
                'statut'           => 'en_attente',
            ]);

            foreach ($cartRows as $row) {
                // Verrouille la ligne en base de données pour éviter la survente concurrente
                $produit = Produit::where('id', $row->produit_id)->lockForUpdate()->first();

                if (!$produit) {
                    throw new \Exception("Un article de votre panier n'existe plus en boutique.");
                }

                if ($produit->stock < $row->quantite) {
                    throw new \Exception("Stock insuffisant pour « {$produit->nom} ». Quantité disponible : {$produit->stock}.");
                }

                // Décrémenter le stock du produit en base
                $produit->decrement('stock', $row->quantite);

                $subtotal = $produit->prix * $row->quantite;
                $total   += $subtotal;

                OrderItem::create([
                    'order_id'      => $order->id,
                    'produit_id'    => $produit->id,
                    'quantite'      => $row->quantite,
                    'prix_unitaire' => $produit->prix,
                ]);
            }

            $order->update(['total' => $total]);

            DB::commit();

            // Vider le panier en base
            Cart::where('session_id', $sessionId)->delete();

            return redirect()->route('checkout.success', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la commande : ' . $e->getMessage());
        }
    }

   public function success(int $id)
{
    // Sécurité IDOR : l'utilisateur ne peut voir que sa propre commande
    $order = Order::where('id', $id)
        ->where('user_id', Auth::id())
        ->with('items.produit')
        ->firstOrFail();

    return view('checkout.success', compact('order'));
}
}
