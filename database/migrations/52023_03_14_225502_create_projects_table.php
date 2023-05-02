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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->string('project_number');
            $table->date('project_date');
            $table->string('project_description');
            $table->string('project_state');
            $table->string('project_comments')->nullable();
            $table->string('pictures')->nullable();
            $table->string('file')->nullable();
            $table->foreignId('boat_id')->constrained('boats','boat_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
