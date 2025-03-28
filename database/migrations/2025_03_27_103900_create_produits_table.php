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
        Schema::create('produits', function (Blueprint $table) {
            $table->id(); 
            $table->timestamps(); 
            $table->string('product_name');
            $table->string('product_description');
            $table->integer('product_stock'); 
            $table->decimal('product_prix', 8, 2); 
            $table->string('product_image');
            $table->string('occassion')->nullable;
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
       
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
