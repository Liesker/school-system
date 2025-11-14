<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vak', function (Blueprint $table) {
            $table->id();
            $table->string('naam'); // verplicht
            $table->text('beschrijving')->nullable(); 
            $table->string('afbeelding')->nullable(); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vak');
    }
};
