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
        Schema::create('worksheets', function (Blueprint $table) {
            $table->id('worksheet_id');
            $table->date('worksheet_date');
            $table->longText('worksheet_description');
            $table->time('worksheet_start_time');
            $table->time('worksheet_finish_time');
            $table->time('worksheet_effective_time');
            $table->foreignId('project_id')->constrained('projects','project_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worksheets');
    }
};
