<?php

use App\Models\Product;
use App\Models\ProductDetail;
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
        Schema::create(ProductDetail::TABLENAME, function (Blueprint $table) {
            $table->id(ProductDetail::ID)->primary(); //PK, auto-incrementing
            // FK from ID in table product
            $table->unsignedBigInteger(ProductDetail::PRODUCT_ID);
            $table->foreign(ProductDetail::PRODUCT_ID)->references(Product::ID)->on(Product::TABLENAME)->onDelete('cascade');
            $table->decimal(ProductDetail::UNITPRICE, 10, 2)->nullable();
            $table->text(ProductDetail::ADMIN_NOTES)->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};