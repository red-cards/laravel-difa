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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('size');
            $table->json('color');
            $table->bigInteger('price');
            $table->boolean('is_discount')->default(false);
            $table->unsignedBigInteger('discount_id');
            $table->unsignedBigInteger('category_product_id');
            $table->unsignedBigInteger('brand_product_id');
            $table->timestamps();
        });

        Schema::table('products',function(Blueprint $table){
            $table->foreign('discount_id')->references('id')->on('discount');
            $table->foreign('category_product_id')->references('id')->on('category_product');
            $table->foreign('brand_product_id')->references('id')->on('brand_product');
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
