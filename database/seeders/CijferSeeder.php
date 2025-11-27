<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cijfer;
use App\Models\User;

class CijferSeeder extends Seeder
{
    public function run(): void
    {
        // Zorg dat er users bestaan
        if (User::count() === 0) {
            User::factory()->count(5)->create();
        }

        $users = User::all();

        $vakken = [
            'Wiskunde',
            'Nederlands',
            'Engels',
            'Biologie',
            'Geschiedenis',
        ];

        foreach ($users as $user) {
            foreach ($vakken as $vak) {
                Cijfer::create([
                    'user_id' => $user->id,
                    'naam'    => 'Toets ' . $vak,
                    'weging'  => rand(1, 2), // random weging
                    'vak'     => $vak,
                    'waarde'  => rand(1, 10), // random cijfer
                ]);
            }
        }
    }
}
