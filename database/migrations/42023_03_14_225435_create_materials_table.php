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
        Schema::create('materials', function (Blueprint $table) {
            $table->id('material_id');
            $table->string('material_name');
            $table->float('material_stock',8,2)->nullable();
            $table->float('material_buy_price', 8, 2)->nullable();
            $table->float('material_sell_price', 8, 2);
            $table->string('material_sn')->nullable();
            $table->foreignId('supplier_id')->constrained('suppliers','supplier_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
