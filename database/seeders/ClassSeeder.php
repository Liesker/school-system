<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            ['name' => 'Projecten', 'description' => 'Werken aan je project', 'capacity' => 25, 'roster_id' => 1, 'is_available' => true, 'date' => '2025-12-01'],
            ['name' => 'Back-end development', 'description' => 'Werken aan achtergrondprocessen in een website', 'capacity' => 30, 'roster_id' => 2, 'is_available' => true, 'date' => '2025-12-01'],
            ['name' => 'Front-end development', 'description' => 'Werken aan de voorkant van een website', 'capacity' => 20, 'roster_id' => 3, 'is_available' => false, 'date' => '2025-12-01'],
            ['name' => 'Keuzedeel', 'description' => 'Werken aan gekozen specialisatie', 'capacity' => 15, 'roster_id' => 4, 'is_available' => true, 'date' => '2025-12-01'],
            ['name' => 'Projecten', 'description' => 'Werken aan je project', 'capacity' => 30, 'roster_id' => 5, 'is_available' => true, 'date' => '2025-12-01'],
        ];

        Classroom::insert($classes);
    }
}
