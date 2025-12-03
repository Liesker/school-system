<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cijfer;
use App\Models\Classroom;
use App\Models\Presence;
use App\Models\Vak;
use App\Models\Module;
use App\Models\Opdracht;
use App\Models\Roster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get statistics
        $stats = [
            'total_users' => User::count(),
            'total_students' => User::whereHas('role', function($query) {
                $query->where('name', 'Student');
            })->count(),
            'total_teachers' => User::whereHas('role', function($query) {
                $query->where('name', 'Teacher');
            })->count(),
            'total_grades' => Cijfer::count(),
            'total_classrooms' => Classroom::count(),
            'total_presences' => Presence::count(),
            'total_subjects' => Vak::count(),
            'total_modules' => Module::count(),
            'total_assignments' => Opdracht::count(),
            'total_rosters' => Roster::count(),
        ];

        // Get recent grades (last 5)
        $recent_grades = Cijfer::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Get upcoming classes (next 5)
        $upcoming_classes = Classroom::with('roster')
            ->where('date', '>=', now()->toDateString())
            ->orderBy('date', 'asc')
            ->limit(5)
            ->get();

        // Get average grade
        $average_grade = Cijfer::avg('waarde') ?? 0;

        // Get today's classes
        $today_classes = Classroom::whereDate('date', today())->count();

        return view('dashboard', compact('stats', 'recent_grades', 'upcoming_classes', 'average_grade', 'today_classes'));
    }
}

