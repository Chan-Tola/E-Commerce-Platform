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
        Schema::create('tbstaff', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->uniqid();
            $table->string('password'); //store hased password
            $table->string('phone');
            $table->string('address')->nullable();
            $table->enum('role',['admin','staff'])->default('staff');
            $table->date('date_of_birth')->nullable();
            $table->date('hire_date');
            $table->enum('status', ['active','resigned'])->default('active');
            $table->string('profile_picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbstaff');
    }
};