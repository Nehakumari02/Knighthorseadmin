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
        Schema::create('order_shipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_order_id");
            $table->unsignedBigInteger("shipment_id");
            $table->unsignedBigInteger("user_id");
            $table->timestamps();
            $table->string('tracking_number');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('delivery_date');
            $table->string('delivery_charge');
            $table->tinyInteger('shipment_status')->comment(' BOOKED= 0, READY_FOR_SHIPPING  = 1,ON_THE_WAY = 2, DELIVERED = 3');
            $table->foreign("product_order_id")->references("id")->on("product_orders")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("shipment_id")->references("id")->on("shipments")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_shipments');
    }
};
