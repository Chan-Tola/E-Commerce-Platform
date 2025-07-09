<?php

use App\Models\Order;
use App\Models\User;
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
        Schema::create(Order::TABLENAME, function (Blueprint $table) {
            $table->id(Order::ORDER_CODE)->primary(); //PK, auto-incrementing 
            $table->integer(Order::ORDER_QTY); // Int for qty of product selected
            $table->decimal(Order::TOTAL, 10, 2); // total qty * price

            // Fk: UserID references user.id
            $table->unsignedBigInteger(Order::USER_ID);
            $table->foreign(Order::USER_ID)->references(User::ID)->on(User::TABLENAME)->onDelete('cascade');
            //onDelete('cascade') do It automatically deletes all related records in the child table when the parent record is deleted.
            // Snapshot of username (not FK)
            
            $table->string(Order::USERNAME);
            $table->timestamps(); // adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};