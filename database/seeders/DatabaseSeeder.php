<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            CijferSeeder::class,
            PresenceSeeder::class,
            VakSeeder::class,
            ModuleSeeder::class,
            OpdrachtSeeder::class,
            GidsSeeder::class,
            GidsVakSeeder::class,
        ]);

        User::factory()->create([
            'firstname' => 'Test',
            'lastname' => 'User',
            'phone' => '1234567890',
            'address' => '123 Main St',
            'city' => 'Anytown',
            'state' => 'CA',
            'zip' => '12345',
            'country' => 'USA',
            'email' => 'test@example.com',
        ]);


    }
}
