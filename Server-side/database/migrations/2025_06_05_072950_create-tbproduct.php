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
           $table->id(); // This creates an auto-incrementing BIGINT (unsigned) primary key named 'id'
            $table->string('name'); // Equivalent to VARCHAR(255) NOT NULL
            $table->decimal('price', 10, 2); // Equivalent to DECIMAL(10, 2) NOT NULL
            $table->integer('quantity')->default(0); // Equivalent to INT NOT NULL DEFAULT 0
            $table->enum('status', ['normal', 'popular'])->default('normal'); // Equivalent to ENUM NOT NULL DEFAULT 'normal'
            $table->string('image')->nullable(); // Equivalent to VARCHAR(255) NULL
            $table->date('sell_date'); // Equivalent to DATE NOT NULL

            // For created_at and updated_at to match your SQL defaults:
            $table->timestamp('created_at')->useCurrent(); // Sets default to CURRENT_TIMESTAMP
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // Sets default to CURRENT_TIMESTAMP and updates on row modification
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