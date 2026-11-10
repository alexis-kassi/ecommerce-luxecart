<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class PromoController extends Controller
{
    /**
     * Applique un code promo à la session du panier.
     */
   public function apply(Request $request)
{
    $code  = strtoupper(trim($request->input('code', '')));
    $codes = config('promoCodes', []);

    if (!$code) {
        return response()->json([
            'success' => false,
            'message' => 'Veuillez saisir un code promo.',
        ]);
    }

    if (!isset($codes[$code])) {
        return response()->json([
            'success' => false,
            'message' => 'Code promo invalide ou expiré.',
        ]);
    }

    $promo = $codes[$code];
    $total = $this->cartTotal();   // calculé côté serveur

    $discount = match ($promo['type']) {
        'percent' => round($total * $promo['value'] / 100),
        'fixed'   => min($promo['value'], $total),
        default   => 0,
    };

    session([
        'promo_code'     => $code,
        'promo_label'    => $promo['label'],
        'promo_discount' => $discount,
    ]);

    return response()->json([
        'success'         => true,
        'code'            => $code,
        'label'           => $promo['label'],
        'discount_amount' => $discount,
        'new_total'       => max(0, $total - $discount),
    ]);
}

private function cartTotal(): float
{
    return Cart::where('session_id', session()->getId())
        ->with('produit')
        ->get()
        ->sum(fn ($ligne) => ($ligne->produit?->prix ?? 0) * $ligne->quantite);
}

    /**
     * Retire le code promo de la session.
     */

    public function remove()
    {
        session()->forget(['promo_code', 'promo_label', 'promo_discount']);

        $total = Cart::where('session_id', $this->sessionId())
            ->with('produit')
            ->get()
            ->sum(fn($ligne) => $ligne->produit->prix * $ligne->quantite);

        return response()->json([
            'success'   => true,
            'new_total' => $total,
        ]);
    }

    private function sessionId(): string
    {
        return session()->getId();
    }
}
