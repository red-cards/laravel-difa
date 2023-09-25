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
        Schema::create('bundling_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bundling_id')->unique();
            $table->unsignedBigInteger('products_id')->unique();
            $table->timestamps();
        });

        Schema::table('bundling_products',function(Blueprint $table){
            $table->foreign('bundling_id')->references('id')->on('bundling');
            $table->foreign('products_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bundling_products');
    }
};
