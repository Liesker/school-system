<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ClassController extends Controller
{
    public function index()
    {
        // Ophalen van '?start=YYYY-MM-DD' of huidige week
        $startParam = request()->query('start');
        $startOfWeek = $startParam
            ? Carbon::parse($startParam)->startOfWeek()
            : Carbon::now()->startOfWeek();

        // Ma t/m Vrij
        $days = [];
        for ($i = 0; $i < 5; $i++) {
            $days[] = $startOfWeek->copy()->addDays($i);
        }

        // Datumbereik: maandag t/m vrijdag
        $startDate = $startOfWeek->toDateString();
        $endDate   = $startOfWeek->copy()->addDays(4)->toDateString();

        // Ophalen van lessen die binnen deze week vallen
        $classes = Classroom::with('roster')
            ->whereBetween('date', [$startDate, $endDate])
            ->get();

        // If no classes found in the current week, fall back to the week of the earliest class
        if ($classes->isEmpty()) {
            $firstClass = Classroom::whereNotNull('date')->orderBy('date')->first();
            if ($firstClass) {
                $startOfWeek = Carbon::parse($firstClass->date)->startOfWeek();

                // recompute days and date range
                $days = [];
                for ($i = 0; $i < 5; $i++) {
                    $days[] = $startOfWeek->copy()->addDays($i);
                }

                $startDate = $startOfWeek->toDateString();
                $endDate   = $startOfWeek->copy()->addDays(4)->toDateString();

                $classes = Classroom::with('roster')
                    ->whereBetween('date', [$startDate, $endDate])
                    ->get();
            }
        }

        return view('classes.index', compact('classes', 'days', 'startOfWeek'));
    }

    public function show($id)
    {
        $class = Classroom::with('roster')->findOrFail($id);
        return view('classes.show', compact('class'));
    }

    public function create()
    {
        $rosters = \App\Models\Roster::all();

        $classyears = $rosters->pluck('classyear')->filter()->unique()->sort()->values();
        $days = $rosters->pluck('day')->filter()->unique()->values();
        $lesson_hours = $rosters->pluck('lesson_hour')->filter()->unique()->sort()->values();
        $class_numbers = $rosters->pluck('class_number')->filter()->unique()->sort()->values();

        // Backwards-compat alias for older views that used `$years`
        $years = $classyears;

        return view('classes.create', compact('rosters', 'classyears', 'years', 'days', 'lesson_hours', 'class_numbers'));
    }

    public function edit($id)
    {
        $class = Classroom::with('roster')->findOrFail($id);
        $rosters = \App\Models\Roster::all();

        $classyears = $rosters->pluck('classyear')->filter()->unique()->sort()->values();
        $days = $rosters->pluck('day')->filter()->unique()->values();
        $lesson_hours = $rosters->pluck('lesson_hour')->filter()->unique()->sort()->values();
        $class_numbers = $rosters->pluck('class_number')->filter()->unique()->sort()->values();

        // Backwards-compat alias for older views that used `$years`
        $years = $classyears;

        return view('classes.edit', compact('class', 'rosters', 'classyears', 'years', 'days', 'lesson_hours', 'class_numbers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'roster_id' => 'nullable|exists:rosters,id',
            'is_available' => 'required|boolean',
            'date' => 'required|date',
            'day' => 'nullable|string',
            'classyear' => 'nullable|integer',
            'lesson_hour' => 'nullable|integer',
            'class_number' => 'nullable|integer',
        ]);

        if (empty($data['roster_id']) && ($data['classyear'] || $data['lesson_hour'] || $data['class_number'] || $data['day'])) {
            $rosterAttributes = array_filter([
                'classyear' => $data['classyear'] ?? null,
                'lesson_hour' => $data['lesson_hour'] ?? null,
                'class_number' => $data['class_number'] ?? null,
                'day' => $data['day'] ?? null,
            ]);

            $roster = \App\Models\Roster::firstOrCreate($rosterAttributes, [
                'term' => 'Auto',
            ]);

            if (empty($roster->start_time) && !empty($data['lesson_hour'])) {
                $times = ['08:00:00', '09:00:00', '10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00'];
                $lh = (int) $data['lesson_hour'];
                if ($lh >= 1 && $lh <= count($times)) {
                    $start = $times[$lh - 1];
                    $end = $lh < count($times) ? $times[$lh] : Carbon::parse($start)->addHour()->format('H:i:s');
                    $roster->start_time = $start;
                    $roster->end_time = $end;
                    $roster->save();
                }
            }

            $data['roster_id'] = $roster->id;
        }

        $class = Classroom::create($data);

        return redirect()
            ->route('classrooms.show', ['id' => $class->id])
            ->with('success', 'Class created successfully.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'roster_id' => 'nullable|exists:rosters,id',
            'is_available' => 'required|boolean',
            'date' => 'required|date',
            'day' => 'nullable|string',
            'classyear' => 'nullable|integer',
            'lesson_hour' => 'nullable|integer',
            'class_number' => 'nullable|integer',
        ]);

        if (empty($data['roster_id']) && ($data['classyear'] || $data['lesson_hour'] || $data['class_number'] || $data['day'])) {
            $rosterAttributes = array_filter([
                'classyear' => $data['classyear'] ?? null,
                'lesson_hour' => $data['lesson_hour'] ?? null,
                'class_number' => $data['class_number'] ?? null,
                'day' => $data['day'] ?? null,
            ]);

            $roster = \App\Models\Roster::firstOrCreate($rosterAttributes, [
                'term' => 'Auto',
            ]);

            if (empty($roster->start_time) && !empty($data['lesson_hour'])) {
                $times = ['08:00:00', '09:00:00', '10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00'];
                $lh = (int) $data['lesson_hour'];
                if ($lh >= 1 && $lh <= count($times)) {
                    $start = $times[$lh - 1];
                    $end = $lh < count($times) ? $times[$lh] : Carbon::parse($start)->addHour()->format('H:i:s');
                    $roster->start_time = $start;
                    $roster->end_time = $end;
                    $roster->save();
                }
            }

            $data['roster_id'] = $roster->id;
        }

        $class = Classroom::findOrFail($id);
        $class->update($data);

        return redirect()
            ->route('classrooms.show', ['id' => $class->id])
            ->with('success', 'Class updated successfully.');
    }
}
