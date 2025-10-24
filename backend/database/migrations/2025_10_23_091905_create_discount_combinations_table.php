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
        Schema::create('discount_combinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('discount_id')->comment('Main promotion code')->constrained('discounts')->cascadeOnDelete();
            $table->foreignId('combinable_discount_id')->comment('Coupon codes can be applied in general')->constrained('discounts')->cascadeOnDelete();
            $table->unique(['discount_id', 'combinable_discount_id'], 'unique_discount_combination');
            $table->boolean('is_mutual')->default(true)->comment('Allow 2-way matching or not');
            $table->integer('priority')->default(0)->comment('Priority when combining');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_combinations');
    }
};
