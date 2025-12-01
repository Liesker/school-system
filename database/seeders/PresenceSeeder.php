<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PresenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('presences')->insert([
            [
                'date' => Carbon::today()->subDay()->toDateString(),
                'time' => '08:00:00',
                'option' => 'present',
                'timecreated_at' => $now,
                'datecreated_at' => $now,
                'description' => '',
            ],
            [
                'date' => Carbon::today()->toDateString(),
                'time' => '08:05:00',
                'option' => 'absent',
                'timecreated_at' => $now,
                'datecreated_at' => $now,
                'description' => 'Te laat gekomen vanwege verkeer.',
            ],
            [
                'date' => Carbon::today()->toDateString(),
                'time' => '08:10:00',
                'option' => 'present',
                'timecreated_at' => $now,
                'datecreated_at' => $now,
                'description' => '',
            ],
        ]);
    }
}
