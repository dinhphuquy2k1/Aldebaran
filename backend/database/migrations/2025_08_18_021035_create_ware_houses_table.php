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
        Schema::create('ware_houses', function (Blueprint $table) {
            $table->id();
            $table->string('warehouse_name', 255)->unique();
            $table->tinyInteger('warehouse_type')->default(0);
            $table->string('warehouse_contact', 255)->nullable();
            $table->string('phone_number', 255)->nullable();
            $table->string('detailed_address', 255)->nullable();
            $table->string('warehouse_address', 255)->nullable();
            $table->tinyInteger('warehouse_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ware_houses');
    }
};
