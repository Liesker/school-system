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
        $rosters = [
            ['term' => 'Fall', 'year' => 2023, 'lesson_hour' => 1, 'class_number' => 101],
            ['term' => 'Winter', 'year' => 2023, 'lesson_hour' => 2, 'class_number' => 102],
            ['term' => 'Spring', 'year' => 2022, 'lesson_hour' => 3, 'class_number' => 103],
            ['term' => 'Summer', 'year' => 2024, 'lesson_hour' => 4, 'class_number' => 104],
        ];
        Roster::insert($rosters);
    }
}
