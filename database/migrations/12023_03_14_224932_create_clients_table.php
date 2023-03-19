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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('client_id')->autoIncrement();
            $table->string('client_name');
            $table->string('client_street')->nullable();
            $table->string('client_pc')->nullable();
            $table->string('client_city')->nullable();
            $table->string('client_country')->nullable();
            $table->string('client_telephone')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_ident')->nullable();
            $table->string('client_picture')->nullable();
            $table->string('client_comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
