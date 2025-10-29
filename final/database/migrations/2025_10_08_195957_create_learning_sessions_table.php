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
        Schema::create('learning_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('timing_id')->constrained('timings')->onDelete('CASCADE'); // TIMING
            $table->foreignId('week_id')->constrained('weeks')->onDelete('CASCADE'); // WEEK
            $table->date('session_date'); // DATE
            $table->foreignId('module_id')->constrained('modules')->onDelete('CASCADE'); // MODULE
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('CASCADE');
            $table->string('session_type'); // TYPE
            $table->string('sessionable_type'); // App\Models\Company or App\Models\Section
            $table->unsignedBigInteger('sessionable_id');
            $table->foreignId('room_id')->constrained('rooms')->onDelete('CASCADE'); // ROOM
            $table->boolean('absented')->default(false); // ABSENTED
            $table->boolean('caughtup')->default(false); // caughtup
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_sessions');
    }
};
