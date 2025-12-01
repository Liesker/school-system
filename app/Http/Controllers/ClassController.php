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

        return view('classes.index', compact('classes', 'days', 'startOfWeek'));
    }


    public function show($id)
    {
        $class = Classroom::with('roster')->findOrFail($id);
        return view('classes.show', compact('class'));
    }

    public function edit($id)
    {
        $class = Classroom::with('roster')->findOrFail($id);
        $rosters = \App\Models\Roster::all();
        return view('classes.edit', compact('class', 'rosters'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'roster_id' => 'required|exists:rosters,id',
            'is_available' => 'required|boolean',
            'date' => 'required|date',
        ]);

        $class = Classroom::findOrFail($id);
        $class->update($data);

        return redirect()
            ->route('classrooms.show', ['id' => $class->id])
            ->with('success', 'Class updated successfully.');
    }

    public function destroy($id)
    {
        \App\Models\Classroom::destroy($id); // ✅ ID meegegeven
        return redirect()->route('classrooms')->with('success', 'Klas verwijderd.');
    }


    public function create()
    {
        $rosters = \App\Models\Roster::all();
        return view('classes.create', compact('rosters'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'roster_id' => 'required|exists:rosters,id',
            'is_available' => 'required|boolean',
            'date' => 'required|date',
        ]);

        $class = Classroom::create($data);

        return redirect()
            ->route('classrooms.show', ['id' => $class->id])
            ->with('success', 'Class created successfully.');
    }
}
