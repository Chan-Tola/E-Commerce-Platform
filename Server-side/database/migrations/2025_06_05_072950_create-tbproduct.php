<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Product::TABLENAME, function (Blueprint $table) {
            $table->id(); // This creates an auto-incrementing BIGINT (unsigned) primary key named 'id'
            $table->string(Product::NAME); // Equivalent to VARCHAR(255) NOT NULL
            $table->decimal(Product::PRICE, 10, 2); // Equivalent to DECIMAL(10, 2) NOT NULL
            $table->integer(Product::QUANTITY)->default(0); // Equivalent to INT NOT NULL DEFAULT 0
            $table->enum(Product::STATUS, ['normal', 'popular'])->default('normal'); // Equivalent to ENUM NOT NULL DEFAULT 'normal'
            $table->string(Product::IMAGE)->nullable(); // Equivalent to VARCHAR(255) NULL
            $table->date(Product::SELL_DATE); // Equivalent to DATE NOT NULL

            // For created_at and updated_at to match your SQL defaults:
            $table->timestamp(Product::CREATED_AT)->useCurrent(); // Sets default to CURRENT_TIMESTAMP
            $table->timestamp(Product::UPDATED_AT)->useCurrent()->useCurrentOnUpdate(); // Sets default to CURRENT_TIMESTAMP and updates on row modification
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
