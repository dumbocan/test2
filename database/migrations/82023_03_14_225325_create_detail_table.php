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
        Schema::create('detail', function (Blueprint $table) {
            $table->id('detail_id');
            $table->date('detail_date')->nullable();
            $table->foreignId('worksheet_id')->constrained('worksheets','worksheet_id');
            $table->foreignId('material_id')->constrained('materials','material_id');
            $table->string('material_quantity')->nullable();
            $table->float('detail_price')->nullable();
            $table->integer('detail_discount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail');
    }
};
