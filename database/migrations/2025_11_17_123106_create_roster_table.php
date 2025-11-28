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
        Schema::create('rosters', function (Blueprint $table) {
            $table->id();

            $table->string('location');
            $table->year('year');
            // schedule fields for the weekly grid
            $table->string('day')->nullable(); // Ma, Di, Wo, Do, Vr
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->integer('lesson_hour')->nullable();
            $table->integer('class_number')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rosters');
    }
};
