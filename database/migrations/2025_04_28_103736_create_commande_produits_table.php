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
        Schema::create('commande_produits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('Product_id')->constrained('produits')->onDelete('cascade');
            $table->foreignId('Commande_id')->constrained('commandes')->onDelete('cascade');
            $table->integer('quantity');
            $table->float('price');
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_produits');
    }
};
