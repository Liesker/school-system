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
        Schema::create('vakken', function (Blueprint $table) {
        $table->id();
        $table->string('naam')->unique();
        $table->integer('totaal_toetsen')->default(5); // aantal toetsen dat vereist is
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vakken');
    }
};
