<?php

namespace Database\Seeders;

use App\Models\Klas;
use App\Models\Opleiding;
use Illuminate\Database\Seeder;

class KlasSeeder extends Seeder
{
    public function run(): void
    {
        $opleidingen = Opleiding::all();

        $klassen = [
            // Informatica
            ['naam' => 'INFO-1A', 'opleiding_id' => $opleidingen->where('naam', 'Informatica')->first()->id, 'jaar' => 2023],
            ['naam' => 'INFO-1B', 'opleiding_id' => $opleidingen->where('naam', 'Informatica')->first()->id, 'jaar' => 2023],
            ['naam' => 'INFO-2A', 'opleiding_id' => $opleidingen->where('naam', 'Informatica')->first()->id, 'jaar' => 2022],
            ['naam' => 'INFO-3A', 'opleiding_id' => $opleidingen->where('naam', 'Informatica')->first()->id, 'jaar' => 2021],

            // Bedrijfskunde
            ['naam' => 'BK-1A', 'opleiding_id' => $opleidingen->where('naam', 'Bedrijfskunde')->first()->id, 'jaar' => 2023],
            ['naam' => 'BK-2A', 'opleiding_id' => $opleidingen->where('naam', 'Bedrijfskunde')->first()->id, 'jaar' => 2022],

            // Elektrotechniek
            ['naam' => 'ELEK-1A', 'opleiding_id' => $opleidingen->where('naam', 'Elektrotechniek')->first()->id, 'jaar' => 2023],
            ['naam' => 'ELEK-2A', 'opleiding_id' => $opleidingen->where('naam', 'Elektrotechniek')->first()->id, 'jaar' => 2022],

            // Grafische Vormgeving
            ['naam' => 'GVORM-1A', 'opleiding_id' => $opleidingen->where('naam', 'Grafische Vormgeving')->first()->id, 'jaar' => 2023],

            // Verpleegkunde
            ['naam' => 'VERP-1A', 'opleiding_id' => $opleidingen->where('naam', 'Verpleegkunde')->first()->id, 'jaar' => 2023],
            ['naam' => 'VERP-2A', 'opleiding_id' => $opleidingen->where('naam', 'Verpleegkunde')->first()->id, 'jaar' => 2022],
        ];

        foreach ($klassen as $klas) {
            Klas::create($klas);
        }
    }
}