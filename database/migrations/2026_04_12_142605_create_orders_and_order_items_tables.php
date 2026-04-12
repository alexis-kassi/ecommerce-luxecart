<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('nom');
            $blueprint->string('email');
            $blueprint->string('telephone');
            $blueprint->string('adresse');
            $blueprint->string('ville');
            $blueprint->decimal('total', 15, 2);
            $blueprint->string('statut')->default('en_attente');
            $blueprint->string('methode_paiement')->default('paiement_livraison');
            $blueprint->timestamps();
        });

        Schema::create('order_items', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId('order_id')->constrained()->onDelete('cascade');
            $blueprint->foreignId('produit_id')->constrained('produits')->onDelete('cascade');
            $blueprint->integer('quantite');
            $blueprint->decimal('prix_unitaire', 15, 2);
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
