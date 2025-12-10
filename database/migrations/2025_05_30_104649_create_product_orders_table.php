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
        Schema::create('product_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->text('booking_data');
            $table->unsignedBigInteger("payment_gateway_currency_id")->nullable();
            $table->unsignedBigInteger("order_id");
            $table->string('trx_id')->comment('Transaction ID')->nullable();
            $table->integer('booking_exp_seconds')->default(600)->nullable();
            $table->string('payment_method')->nullable();
            $table->string('uuid');
            $table->decimal('total_charge', 28, 8)->default(0);
            $table->decimal('price', 28, 8)->default(0);
            $table->decimal('payable_price', 28, 8)->default(0);
            $table->decimal('gateway_payable_price', 28, 8)->nullable();
            $table->text('message')->nullable();
            $table->string('type');
            $table->string('payment_currency')->nullable()->comment('user payment currency (wallet/gateway)');
            $table->string('remark')->nullable();
            $table->text('details')->nullable();
            $table->tinyInteger('status')->comment('STATUS_SUCCESS= 1,STATUS_PENDING= 2, STATUS_REJECTED= 3')->nullable();
            $table->text('reject_reason')->nullable();
            $table->text('callback_ref')->nullable();


            $table->foreign("order_id")->references("id")->on("orders")->onDelete("cascade")->onUpdate("cascade");

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("payment_gateway_currency_id")->references("id")->on("payment_gateway_currencies")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_orders');
    }
};
