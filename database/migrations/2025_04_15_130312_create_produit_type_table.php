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
        Schema::create('produit_type', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade');

   
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
    
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_type');
    }
};
