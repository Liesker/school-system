<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpdrachtSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('opdracht')->insert([
            ['naam' => 'Maak een website', 'beschrijving' => 'Eenvoudige HTML pagina', 'uitleg' => 'Gebruik HTML en CSS', 'module_id' => 1],
            ['naam' => 'Laravel Project', 'beschrijving' => 'Kleine CRUD app', 'uitleg' => 'Gebruik routes, controllers, views', 'module_id' => 2],
            ['naam' => 'SQL oefening', 'beschrijving' => 'Selecteer data uit tabellen', 'uitleg' => 'Gebruik JOIN en WHERE', 'module_id' => 3],
        ]);
    }
}
