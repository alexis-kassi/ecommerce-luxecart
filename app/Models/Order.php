<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'email',
        'telephone',
        'adresse',
        'ville',
        'total',
        'statut',
        'methode_paiement'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
