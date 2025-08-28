<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Src\Domain\ProductGroup\Enums\ProductGroupConditionModeEnum;
use Src\Domain\ProductGroup\Enums\ProductGroupTypeEnum;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();

            $table->enum('type', ProductGroupTypeEnum::getValues())->default(ProductGroupTypeEnum::AUTO);

            $table->enum('condition_mode', ProductGroupConditionModeEnum::getValues())->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_groups');
    }
};
