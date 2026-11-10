<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;


class WishlistController extends Controller
{
    /**
     * Affiche la liste des produits en favoris.
     */
    public function index()
    {
        $wishlist = session()->get('wishlist', []);
        $ids = array_keys($wishlist);

        $produits = empty($ids) ? collect() : Produit::whereIn('id', $ids)->get();

        return view('wishlist.index', compact('produits'));
    }

    /**
     * Ajoute ou retire un produit des favoris (Toggle AJAX).
     */
    public function toggle(int $id, Request $request)
    {
        $produit = Produit::find($id);

        if (!$produit) {
            return response()->json([
                'success' => false,
                'message' => 'Produit introuvable.',
            ], 404);
        }

        $wishlist = session()->get('wishlist', []);
        $added = false;

        if (isset($wishlist[$id])) {
            unset($wishlist[$id]);
            $added = false;
            $message = 'Produit retiré des favoris.';
        } else {
            $wishlist[$id] = now()->toDateTimeString();
            $added = true;
            $message = 'Produit ajouté à vos favoris !';
        }

        session()->put('wishlist', $wishlist);

        return response()->json([
            'success' => true,
            'added'   => $added,
            'count'   => count($wishlist),
            'message' => $message,
        ]);
    }

    /**
     * Supprime un produit des favoris.
     */
   public function remove(Request $request, int $id): JsonResponse|RedirectResponse
{
    $wishlist = $request->session()->get('wishlist', []);
    $removed  = array_key_exists($id, $wishlist);

    if ($removed) {
        unset($wishlist[$id]);
        $request->session()->put('wishlist', $wishlist);
    }

    $message = $removed
        ? __('Produit retiré de vos favoris.')
        : __('Ce produit n’était pas dans vos favoris.');

    if ($request->expectsJson()) {
        return response()->json([
            'success' => true,
            'removed' => $removed,
            'count'   => count($wishlist),
            'message' => $message,
        ]);
    }

    return redirect()->route('wishlist.index')->with('success', $message);
}

    /**
     * Retourne le nombre d'articles en favoris (pour badge en direct).
     */
    public function count()
    {
        return response()->json([
            'count' => count(session()->get('wishlist', [])),
        ]);
    }
}

