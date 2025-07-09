<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /*
        Run the migrations.
    */
    public function up(): void
    {
        Schema::create(User::TABLENAME, function (Blueprint $table) {
            $table->id();
            $table->string(User::USERNAME);
            $table->string(User::USEREMAIL)->unique();
            $table->string(User::USERPASSWORD);
            $table->string(User::USERCONTACT)->nullable();
            $table->string(User::USEREADDRESS)->nullable();
            // role/permission
            $table->enum(User::USERROLE, ['user', 'admin'])->default('user');
            $table->rememberToken(); // for login session
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};