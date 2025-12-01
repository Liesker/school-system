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
            ['name' => 'Math 101', 'description' => 'Basic Mathematics', 'capacity' => 25, 'roster_id' => 1, 'is_available' => true, 'date' => '2025-11-25'],
            ['name' => 'History 201', 'description' => 'World History', 'capacity' => 30, 'roster_id' => 2, 'is_available' => true, 'date' => '2025-11-26'],
            ['name' => 'Science 301', 'description' => 'Advanced Science', 'capacity' => 20, 'roster_id' => 3, 'is_available' => false, 'date' => '2025-11-27'],
            ['name' => 'Art 101', 'description' => 'Introduction to Art', 'capacity' => 15, 'roster_id' => 4, 'is_available' => true, 'date' => '2025-11-28'],
        ];
        Classroom::insert($classes);
    }
}
