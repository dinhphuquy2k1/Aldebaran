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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->tinyInteger('type');
            $table->string('description', 255)->nullable();
            $table->dateTime('start_at')->comment('Start time');
            $table->dateTime('end_at')->nullable()->comment('End Time (NULL if unlimited)');
            $table->decimal('discount_value', 10, 2)->default(0)->comment('Discount value (depending on the type, it can be %)');
            $table->tinyInteger('discount_unit')->nullable()->comment('Unit reduction');
            $table->decimal('max_value', 10, 2)->default(0)->comment('Maximum discount value');
            $table->decimal('min_order_value', 10, 2)->default(0)->comment('Minimum order value');
            $table->json('apply_condition')->comment('Other conditions (e.g. applicable by region, product, etc.)');
            $table->boolean('enabled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
