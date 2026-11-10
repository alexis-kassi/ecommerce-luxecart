<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Produit;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    /**
     * Soumet un nouvel avis sur un produit.
     */
    public function store(Request $request, $produitId)
    {
        $produit = Produit::findOrFail($produitId);

        $validated = $request->validate([
            'auteur'      => 'required|string|min:2|max:60',
            'note'        => 'required|integer|min:1|max:5',
            'commentaire' => 'required|string|min:10|max:1000',
        ], [
            'auteur.required'      => 'Votre prénom est obligatoire.',
            'auteur.min'           => 'Le prénom doit contenir au moins 2 caractères.',
            'note.required'        => 'Veuillez sélectionner une note.',
            'note.min'             => 'La note minimale est 1 étoile.',
            'note.max'             => 'La note maximale est 5 étoiles.',
            'commentaire.required' => 'Le commentaire est obligatoire.',
            'commentaire.min'      => 'Le commentaire doit faire au moins 10 caractères.',
            'commentaire.max'      => 'Le commentaire ne peut pas dépasser 1 000 caractères.',
        ]);

        // Anti-spam simple : un seul avis par session par produit
        $existing = Avis::where('produit_id', $produitId)
            ->where('session_id', session()->getId())
            ->first();

        if ($existing) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vous avez déjà laissé un avis sur ce produit.',
                ], 422);
            }
            return back()->with('avis_error', 'Vous avez déjà laissé un avis sur ce produit.');
        }

        $avis = Avis::create([
            'produit_id'  => $produitId,
            'auteur'      => strip_tags($validated['auteur']),
            'note'        => $validated['note'],
            'commentaire' => strip_tags($validated['commentaire']),
            'valide'      => true,
            'session_id'  => session()->getId(),
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            // Recalculer la note moyenne
            $avg   = Avis::where('produit_id', $produitId)->where('valide', true)->avg('note');
            $count = Avis::where('produit_id', $produitId)->where('valide', true)->count();

            return response()->json([
                'success'    => true,
                'message'    => 'Merci pour votre avis !',
                'avis'       => [
                    'id'          => $avis->id,
                    'auteur'      => $avis->auteur,
                    'note'        => $avis->note,
                    'commentaire' => $avis->commentaire,
                    'date'        => $avis->created_at->translatedFormat('d F Y'),
                ],
                'avg'        => round($avg, 1),
                'count'      => $count,
            ]);
        }

        return back()->with('avis_success', 'Votre avis a bien été publié. Merci !');
    }
}

