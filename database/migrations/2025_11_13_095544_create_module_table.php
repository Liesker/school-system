<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('module', function (Blueprint $table) {
            $table->id();
            $table->string('naam'); // verplicht
            $table->text('beschrijving')->nullable();
            $table->string('afbeelding')->nullable();
            $table->foreignId('vak_id')->constrained('vak')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('module');
    }
};
