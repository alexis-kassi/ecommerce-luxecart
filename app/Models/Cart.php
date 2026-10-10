<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'session_id',
        'user_id',
        'produit_id',
        'quantite',
    ];

    /** Produit associé à la ligne de panier */
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    /** Utilisateur propriétaire du panier (null si invité) */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
