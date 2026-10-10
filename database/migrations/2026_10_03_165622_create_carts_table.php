<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Table de panier persistant.
     * Le panier est identifié par session_id (invités) ou user_id (connectés).
     * La contrainte unique sur (session_id, produit_id) évite les doublons.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->index();
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();
            $table->foreignId('produit_id')
                  ->constrained('produits')
                  ->onDelete('cascade');
            $table->unsignedInteger('quantite')->default(1);
            $table->timestamps();

            // Un produit ne peut apparaître qu'une seule fois par session
            $table->unique(['session_id', 'produit_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};

