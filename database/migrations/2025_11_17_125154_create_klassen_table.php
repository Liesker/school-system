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
        Schema::create('klassen', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->unsignedBigInteger('opleiding_id');
            $table->foreign('opleiding_id')->references('id')->on('opleidingen')->cascadeOnDelete();
            $table->integer('jaar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klassen');
    }
};