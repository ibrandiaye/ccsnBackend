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
        Schema::create('entrees', function (Blueprint $table) {
            $table->id();
            $table->double("quantite");
            $table->unsignedBigInteger("produit_id");
            $table->unsignedBigInteger("fournisseur_id");
            $table->foreign("produit_id")
            ->references("id")
            ->on("produits");
            $table->foreign("fournisseur_id")
            ->references("id")
            ->on("fournisseurs");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrees');
    }
};
