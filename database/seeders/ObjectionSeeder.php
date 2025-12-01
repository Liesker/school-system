<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Objection;

class ObjectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Objection::create([
            'presence_id' => 1,
            'description' => 'I was present, but marked absent by mistake.',
        ]);
    }
}
