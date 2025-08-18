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
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('size_name', 255);
            $table->string('size_option', 255);
            $table->tinyInteger('one_size')->default(0);
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('size_conversion')->default(0);
            $table->string('note', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sizes');
    }
};
