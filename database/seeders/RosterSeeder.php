<?php

namespace Database\Seeders;

use App\Models\Roster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RosterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // These seed entries include day and start/end times to populate the weekly grid
        $rosters = [
            ['location' => 'Main Campus', 'year' => 2023, 'day' => 'Ma', 'start_time' => '08:00:00', 'end_time' => '09:00:00', 'lesson_hour' => 1, 'class_number' => 101],
            ['location' => 'Main Campus', 'year' => 2023, 'day' => 'Di', 'start_time' => '09:00:00', 'end_time' => '10:00:00', 'lesson_hour' => 2, 'class_number' => 102],
            ['location' => 'Main Campus', 'year' => 2022, 'day' => 'Wo', 'start_time' => '10:00:00', 'end_time' => '11:00:00', 'lesson_hour' => 3, 'class_number' => 103],
            ['location' => 'Main Campus', 'year' => 2024, 'day' => 'Do', 'start_time' => '11:00:00', 'end_time' => '12:00:00', 'lesson_hour' => 4, 'class_number' => 104],
            // add a Friday example as well
            ['location' => 'Main Campus', 'year' => 2023, 'day' => 'Vr', 'start_time' => '13:00:00', 'end_time' => '14:00:00', 'lesson_hour' => 5, 'class_number' => 105],
        ];
        Roster::insert($rosters);
    }
}
