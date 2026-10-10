<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
// Models de la table Produit
{
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'stock',
        'categorie',
        'image'
    ];

    /** Lignes de commandes qui référencent ce produit */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /** Lignes de panier actives pour ce produit */
    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }
}



