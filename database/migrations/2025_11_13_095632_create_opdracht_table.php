<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('opdracht', function (Blueprint $table) {
            $table->id();
            $table->string('naam'); // verplicht
            $table->text('beschrijving')->nullable();
            $table->text('uitleg')->nullable();
            $table->foreignId('module_id')->constrained('module')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opdracht');
    }
};
