<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VakSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vak')->insert([
            ['naam' => 'Webdevelopment', 'beschrijving' => 'HTML, CSS, Laravel', 'afbeelding' => null],
            ['naam' => 'Databases', 'beschrijving' => 'SQL en relationele modellen', 'afbeelding' => null],
            ['naam' => 'Algoritmen', 'beschrijving' => 'Basis algoritmen en logica', 'afbeelding' => null],
        ]);
    }
}
