<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GidsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('gids')->insert([
            ['naam' => 'Studiegids 2025', 'beschrijving' => 'Gids voor eerstejaars', 'jaar' => 2025],
            ['naam' => 'Studiegids 2026', 'beschrijving' => 'Gids voor tweedejaars', 'jaar' => 2026],
        ]);
    }
}
