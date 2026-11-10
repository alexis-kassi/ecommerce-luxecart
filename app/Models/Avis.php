<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = 'avis';

    protected $fillable = [
        'produit_id',
        'auteur',
        'note',
        'commentaire',
        'valide',
        'session_id',
    ];

    protected $casts = [
        'valide' => 'boolean',
        'note'   => 'integer',
    ];

    /**
     * Relation : un avis appartient à un produit.
     */
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}

