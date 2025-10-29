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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_name');
             $table->string('teacher_grade');
            $table->timestamps();
        });
        Schema::create('teachers_modules', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('CASCADE');
            $table->foreignId('module_id')->constrained('modules')->onDelete('CASCADE');
            $table->boolean('lecture');
            $table->boolean('dw');
            $table->boolean('lab');
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
