<?php

namespace Database\Seeders;

use App\Models\Afdeling;
use App\Models\Opleiding;
use Illuminate\Database\Seeder;

class AfdelingSeeder extends Seeder
{
    public function run(): void
    {
        $opleidingen = Opleiding::all();

        $afdelingen = [
            // Informatica afdelingen
            [
                'naam' => 'Backend Development',
                'beschrijving' => 'Afdeling gericht op server-side applicatieontwikkeling en databases.',
                'opleiding_id' => $opleidingen->where('naam', 'Informatica')->first()->id,
            ],
            [
                'naam' => 'Frontend Development',
                'beschrijving' => 'Afdeling voor web- en app-interfaces en gebruikerservaring.',
                'opleiding_id' => $opleidingen->where('naam', 'Informatica')->first()->id,
            ],
            [
                'naam' => 'DevOps & Cloud',
                'beschrijving' => 'Specialisatie in cloud-infrastructuur en deployment-processen.',
                'opleiding_id' => $opleidingen->where('naam', 'Informatica')->first()->id,
            ],

            // Bedrijfskunde afdelingen
            [
                'naam' => 'Management',
                'beschrijving' => 'Afdeling gericht op leidinggeving en organisatiemanagement.',
                'opleiding_id' => $opleidingen->where('naam', 'Bedrijfskunde')->first()->id,
            ],
            [
                'naam' => 'Marketing & Sales',
                'beschrijving' => 'Specialisatie in marketingstrategie en verkoopprocessen.',
                'opleiding_id' => $opleidingen->where('naam', 'Bedrijfskunde')->first()->id,
            ],

            // Elektrotechniek afdelingen
            [
                'naam' => 'Industriële Elektronica',
                'beschrijving' => 'Afdeling voor industriële toepassingen en automatisering.',
                'opleiding_id' => $opleidingen->where('naam', 'Elektrotechniek')->first()->id,
            ],
            [
                'naam' => 'Energietechniek',
                'beschrijving' => 'Specialisatie in energieopwekking en -distributie.',
                'opleiding_id' => $opleidingen->where('naam', 'Elektrotechniek')->first()->id,
            ],

            // Grafische Vormgeving afdelingen
            [
                'naam' => 'Digital Design',
                'beschrijving' => 'Afdeling voor digitale ontwerp en multimedia.',
                'opleiding_id' => $opleidingen->where('naam', 'Grafische Vormgeving')->first()->id,
            ],
            [
                'naam' => 'Print Design',
                'beschrijving' => 'Specialisatie in print en fysieke ontwerpen.',
                'opleiding_id' => $opleidingen->where('naam', 'Grafische Vormgeving')->first()->id,
            ],

            // Verpleegkunde afdelingen
            [
                'naam' => 'Algemene Zorg',
                'beschrijving' => 'Afdeling voor basisverpleegkunde en patiëntenzorg.',
                'opleiding_id' => $opleidingen->where('naam', 'Verpleegkunde')->first()->id,
            ],
            [
                'naam' => 'Gespecialiseerde Zorg',
                'beschrijving' => 'Afdeling voor geavanceerde zorgverlening en specialisaties.',
                'opleiding_id' => $opleidingen->where('naam', 'Verpleegkunde')->first()->id,
            ],
        ];

        foreach ($afdelingen as $afdeling) {
            Afdeling::create($afdeling);
        }
    }
}