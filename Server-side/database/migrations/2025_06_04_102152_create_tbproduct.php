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
        Schema::create('tbproduct', function (Blueprint $table) {
            $table->id(); // this id that is PK
            $table->string('productName'); // this is produt name
            $table->integer('qty')->default(0); // Product quantity/stock
            $table->decimal('price',8,2); // this is price of products
            $table->boolean('is_popular')->default(false); // Is it a popular product?
            $table->string('image')->nullable(); // Image file path or name
            $table->date('sell_date')->nullable(); // The date when the product was sold (optional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbproduct');
    }
};