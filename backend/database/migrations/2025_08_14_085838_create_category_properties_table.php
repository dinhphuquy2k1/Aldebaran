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
        Schema::create('category_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('property_id');
            $table->boolean('required')->default(false);
            $table->timestamps();
            // Foreign keys
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('property_id')
                ->references('id')
                ->on('properties')
                ->onDelete('cascade');

            $table->index('category_id', 'categories_properties_category_id_foreign');
            $table->index('property_id', 'categories_properties_property_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_properties');
    }
};
