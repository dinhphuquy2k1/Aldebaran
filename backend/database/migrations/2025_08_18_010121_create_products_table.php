<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('size_id')->nullable();
            $table->tinyInteger('has_variant')->default(0);
            $table->string('brand', 255);
            $table->integer('min_price')->nullable();
            $table->integer('max_price')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->integer('product_price')->nullable();
            $table->json('properties')->nullable();
            $table->string('description', 500);

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('size_id')
                ->references('id')
                ->on('sizes')
                ->onDelete('cascade');
            $table->timestamps();
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
