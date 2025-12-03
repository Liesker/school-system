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
                'date' => Carbon::today()->toDateString(),
                'time' => '08:05:00',
                'option' => 'absent',
                'timecreated_at' => $now,
                'datecreated_at' => $now,
                'description' => 'Te laat gekomen vanwege verkeer.',
                'objection' => null,
            ],
            [
                'date' => Carbon::today()->toDateString(),
                'time' => '08:10:00',
                'option' => 'present',
                'timecreated_at' => $now,
                'datecreated_at' => $now,
                'description' => '',
                'objection' => null,
            ],
            [
                'date' => Carbon::today()->toDateString(),
                'time' => '08:12:00',
                'option' => 'absent',
                'timecreated_at' => $now,
                'datecreated_at' => $now,
                'description' => '',
                'objection' => null,
            ],
            [
                'date' => Carbon::today()->toDateString(),
                'time' => '08:14:00',
                'option' => 'absent',
                'timecreated_at' => $now,
                'datecreated_at' => $now,
                'description' => 'Ingehaald na de pauze.',
                'objection' => null,
            ],
            [
                'date' => Carbon::today()->toDateString(),
                'time' => '08:15:00',
                'option' => 'absent',
                'timecreated_at' => $now,
                'datecreated_at' => $now,
                'description' => 'Ziek gemeld.',
                'objection' => null,
            ],
            [
                'date' => Carbon::today()->toDateString(),
                'time' => '08:20:00',
                'option' => 'absent',
                'timecreated_at' => $now,
                'datecreated_at' => $now,
                'description' => '',
                'objection' => null,
            ]
        ]);
    }
}
