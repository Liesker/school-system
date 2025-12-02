<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RosterController extends Controller
{
    public function index()
    {
        $rosters = \App\Models\Roster::all();
        return view('rosters.index', compact('rosters'));
    }
    public function create()
    {
        // Logic to show form to create a new roster
        return view('rosters.create');
    }

    public function store(Request $request)
    {
        // Logic to store a new roster
        $validated = $request->validate([
            'term' => 'required|string|max:255',
            'classyear' => 'required|integer|min:2000',
            'lesson_hour' => 'nullable|integer|min:1',
            'class_number' => 'nullable|integer|min:1',
        ]);

        \App\Models\Roster::create($validated);
        return redirect()->route('rosters')->with('success', 'Roster created successfully.');
    }

    public function edit($id)
    {
        // Logic to show form to edit an existing roster
        $roster = \App\Models\Roster::findOrFail($id);
        return view('rosters.edit', compact('roster'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing roster
        $validated = $request->validate([
            'term' => 'required|string|max:255',
            'classyear' => 'required|integer|min:2000',
            'lesson_hour' => 'nullable|integer|min:1',
            'class_number' => 'nullable|integer|min:1',
        ]);
        $roster = \App\Models\Roster::findOrFail($id);
        $roster->update($validated);
        return redirect()->route('rosters')->with('success', 'Roster updated successfully.');
    }

    public function delete($id)
    {
        // Logic to delete a roster
        $roster = \App\Models\Roster::findOrFail($id);
        $roster->delete();
        return redirect()->route('rosters')->with('success', 'Roster deleted successfully.');
    }
}
