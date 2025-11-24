<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GidsVakSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('gids_vak')->insert([
            ['gids_id' => 1, 'vak_id' => 1],
            ['gids_id' => 1, 'vak_id' => 2],
            ['gids_id' => 2, 'vak_id' => 1],
            ['gids_id' => 2, 'vak_id' => 3],
        ]);
    }
}
