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
        Schema::create('boats', function (Blueprint $table) {
            $table->id('boat_id');
            $table->string('boat_name');
            $table->string('boat_marina');
            $table->string('boat_type');
            $table->string('boat_picture');
            $table->string('boat_commets');
            $table->foreignId('client_id')->constrained('clients','client_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boats');
    }
};
