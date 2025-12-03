<?php

namespace Database\Seeders;

use App\Models\Opleiding;
use Illuminate\Database\Seeder;

class OpleidingSeeder extends Seeder
{
    public function run(): void
    {
        $opleidingen = [
            [
                'naam' => 'Informatica',
                'omschrijving' => 'Studie gericht op programmeren, databases en IT-infrastructuur. Studenten leren moderne programmeertalen en werken met actuele technologieën.',
            ],
            [
                'naam' => 'Bedrijfskunde',
                'omschrijving' => 'Opleiding voor toekomstige ondernemers en managers. Focus op management, marketing, financiën en organisatiekunde.',
            ],
            [
                'naam' => 'Elektrotechniek',
                'omschrijving' => 'Technische opleiding met aandacht voor elektriciteit, elektronica en industriële systemen.',
            ],
            [
                'naam' => 'Grafische Vormgeving',
                'omschrijving' => 'Creatieve opleiding voor design, fotografie en visuele communicatie.',
            ],
            [
                'naam' => 'Verpleegkunde',
                'omschrijving' => 'Medische opleiding gericht op zorgverlening en patiëntenzorg.',
            ],
        ];

        foreach ($opleidingen as $opleiding) {
            Opleiding::create($opleiding);
        }
    }
}