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
        Schema::create('weeks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('global_week_id')->constrained('global_weeks')->onDelete('CASCADE');
            $table->foreignId('year_id')->constrained('years')->onDelete('CASCADE');
            $table->string('week_type');

            $table->enum('semester', ['1', '2'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weeks');
    }
};
