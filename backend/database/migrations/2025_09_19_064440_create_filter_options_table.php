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
        Schema::create('filter_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable()->comment('Parent filter link');
            $table->tinyInteger('screen_key')->index()->comment('Screen identifier, e.g. product_list, order_list');
            $table->string('label');
            $table->string('value');
            $table->string('type');
            $table->string('source_table')->nullable()->comment('Name of the referenced data table, e.g. categories');
            $table->string('source_column')->nullable()->comment('Display column/value, e.g. id,name');
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('filter_options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filter_options');
    }
};
