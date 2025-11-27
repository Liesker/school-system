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
            ['term' => 'Fall', 'year' => 2023,],
            ['term' => 'Spring', 'year' => 2022],
            ['term' => 'Summer', 'year' => 2024,],
        ];
        Roster::insert($rosters);
    }
}
