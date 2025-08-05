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
        Schema::table('tbstaff',function (Blueprint $table){
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->enum('gender',['male','female'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbstaff', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'last_name', 'gender']);
        });
    }
};
