<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Permission;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Permission::TABLENAME, function (Blueprint $table) {
            $table->id();
            $table->string(Permission::TITLE);
            $table->timestamp(Permission::CREATED_AT)->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Permission::TABLENAME);
    }
};
