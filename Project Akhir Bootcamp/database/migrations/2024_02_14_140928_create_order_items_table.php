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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('order_item_id');
            $table->unsignedBigInteger('order_item_product');
            $table->unsignedBigInteger('order_item_user');
            $table->integer('order_item_qty');
            $table->integer('order_item_subtotal');
            $table->timestamps();

            $table->foreign('order_item_product')->references('product_id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('order_item_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
