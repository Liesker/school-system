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
            ['name' => 'Math 101', 'description' => 'Basic Mathematics', 'capacity' => 25, 'roster_id' => 1],
            ['name' => 'History 201', 'description' => 'World History', 'capacity' => 30, 'roster_id' => 2],
            ['name' => 'Science 301', 'description' => 'Advanced Science', 'capacity' => 20, 'roster_id' => 3],
        ];
        Classroom::insert($classes);
    }
}
