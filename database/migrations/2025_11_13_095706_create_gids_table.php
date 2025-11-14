<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gids', function (Blueprint $table) {
            $table->id();
            $table->string('naam'); // verplicht
            $table->text('beschrijving')->nullable();
            $table->integer('jaar')->nullable();
            // $table->foreignId('opleiding_id')->nullable()->constrained('opleidingen')->onDelete('set null'); 

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gids');
    }
};
