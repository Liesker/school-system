<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presence;

class PresenceController extends Controller
{
    public function index(Request $request)
    {
        $presences = Presence::all();
  
        return view('presence.index', compact('presences'));
        
    }
    public function create()
    {
        return view('presence.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|time',
            'option' => 'required|string',
            'description' => 'nullable|string',
            'timecreated_at' => 'required|time',
            'datecreated_at' => 'required|date',
        ]);

        Presence::create([
           'date' => 'required|date',
            'time' => 'required|time',
            'option' => 'required|string',
            'description' => 'nullable|string',
            'timecreated_at' => 'required|time',
            'datecreated_at' => 'required|date',
        ]);

        return redirect()->route('presence.index')->with('success', 'Presence record created successfully.');
    }
    public function edit($id)
    {
        $presence = Presence::findOrFail($id);
        return view('presence.edit', compact('presence'));
    }
    public function destroy($id)
    {
        $presence = Presence::findOrFail($id);
        $presence->delete();
        return redirect()->route('presence.index')->with('success', 'Presence record deleted successfully.');
    }
}
