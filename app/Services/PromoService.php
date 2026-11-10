<?php

namespace App\Services;

use App\Models\Cart;

class PromoService
{
    /** Total du panier, calculé côté serveur */
    public function cartTotal(): float
    {
        return Cart::where('session_id', session()->getId())
            ->with('produit')
            ->get()
            ->sum(fn ($ligne) => ($ligne->produit?->prix ?? 0) * $ligne->quantite);
    }

    /** Retourne la config d'un code, ou null s'il n'existe pas */
    public function find(string $code): ?array
    {
        return config('promoCodes', [])[$code] ?? null;
    }

    /** Calcule la réduction pour un code et un total donnés */
    public function discount(?array $promo, float $total): float
    {
        if (!$promo) {
            return 0;
        }

        return match ($promo['type']) {
            'percent' => round($total * $promo['value'] / 100),
            'fixed'   => min($promo['value'], $total),
            default   => 0,
        };
    }
}