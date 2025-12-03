<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ClassController extends Controller
{
    public function index()
    {
        // Weekstart ophalen
        // ------------------------------------------------------------
        // Als de gebruiker ?start=YYYY-MM-DD meegeeft → gebruik die datum direct.
        // GEEN startOfWeek(), want dat schoof je datum naar maandag van een andere week.
        // ------------------------------------------------------------
        $startParam = request()->query('start');

        if ($startParam) {
            $startOfWeek = Carbon::parse($startParam);
        } else {
            // standaard: huidige week (maandag)
            $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY);
        }

        // Alles tonen voor X weken vooruit
        $weeksToShow = 10;
        $weeks = [];

        for ($i = 0; $i < $weeksToShow; $i++) {
            $weekStart = $startOfWeek->copy()->addWeeks($i);

            // maandag t/m vrijdag
            $weekDays = [];
            for ($d = 0; $d < 5; $d++) {
                $weekDays[] = $weekStart->copy()->addDays($d);
            }

            $weeks[] = [
                'start' => $weekStart,
                'days' => $weekDays,
            ];
        }

        // Datumbereik voor database-query
        $firstDate = $weeks[0]['start']->toDateString();
        $lastDate = $weeks[$weeksToShow - 1]['start']->copy()->addDays(4)->toDateString();

        // Klassen ophalen
        $classes = Classroom::with('roster')
            ->whereBetween('date', [$firstDate, $lastDate])
            ->get();

        // Blade-compatibiliteit met $days
        $days = $weeks[0]['days'];

        return view('classes.index', compact('weeks', 'classes', 'startOfWeek', 'days'));
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

    public function destroy($id)
    {
        $class = Classroom::findOrFail($id);
        $class->delete();

        return redirect()
            ->route('classrooms')
            ->with('success', 'Class deleted successfully.');
    }
}
