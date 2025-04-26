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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('commande_id')->constrained('commandes')->onDelete('cascade');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('country')->default('Morocco');  
            $table->string('phone');
            $table->date('delivery_date');
            $table->enum('status', ['en_attente', 'en_cours', 'livree', 'echouee', 'annulee', 'reportee'])->default('en_attente');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons');
    }
};
