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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
       
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('shipment_id');
            $table->text('data');
            $table->string('price');
            $table->string('offer_price')->nullable();
            $table->string('uuid');
            $table->string('quantity');
             $table->string('order_quantity');
            $table->string('available_quantity');
            $table->string('image');
            $table->boolean('status')->default(true);
            $table->boolean('popular')->comment('1= popular');
            $table->timestamps();

            $table->string('meta_image');

            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("sub_category_id")->references("id")->on("sub_categories")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("unit_id")->references("id")->on("units")->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('shipment_id')->references('id')->on('shipments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
