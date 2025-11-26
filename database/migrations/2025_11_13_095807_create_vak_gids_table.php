<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gids_vak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gids_id')->constrained('gids')->onDelete('cascade');
            $table->foreignId('vak_id')->constrained('vak')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gids_vak');
    }
};
