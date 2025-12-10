<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->timestamps();
            $table->tinyInteger('order_status')->comment('STATUS_SUCCESS= 1,STATUS_PENDING= 2, STATUS_REJECTED= 3');
            $table->tinyInteger('payment_status')->comment('STATUS_SUCCESS= 1,STATUS_PENDING= 2, STATUS_REJECTED= 3');
            $table->integer('total_amount');
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
