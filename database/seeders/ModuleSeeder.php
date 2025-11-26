<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('module')->insert([
            ['naam' => 'HTML & CSS', 'beschrijving' => 'Front-end basis', 'vak_id' => 1, 'afbeelding' => null],
            ['naam' => 'Laravel Basics', 'beschrijving' => 'Introductie Laravel', 'vak_id' => 1, 'afbeelding' => null],
            ['naam' => 'SQL Queries', 'beschrijving' => 'SELECT, JOIN, etc.', 'vak_id' => 2, 'afbeelding' => null],
        ]);
    }
}
