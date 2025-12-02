<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presence;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PresenceController extends Controller
{
    public function index(Request $request)
    {
        $presences = Presence::all();
  
        return view('presence.index', compact('presences'));
        
    }
    public function show($id)
    {
        $presence = Presence::findOrFail($id);
        return view('presence.show', compact('presence'));
    }
    public function create()
    {
        return view('presence.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'option' => 'required|string',
            'description' => 'nullable|string',
            'timecreated_at' => 'required|date_format:H:i:s',
            'datecreated_at' => 'required|date',
        ]);

        Presence::create([
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'option' => $request->input('option'),
            'description' => $request->input('description'),
            'timecreated_at' => $request->input('timecreated_at'),
            'datecreated_at' => $request->input('datecreated_at'),
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
    public function exportAbsence()
    {
        $absences = Presence::where('option', 'absent')->get();

        $response = new StreamedResponse(function () use ($absences) {
            $handle = fopen('php://output', 'w');
            // CSV header
            fputcsv($handle, ['Date', 'Time', 'Description']);
            // CSV rows
            foreach ($absences as $absence) {
                fputcsv($handle, [
                    $absence->date,
                    $absence->time,
                    $absence->description,
                ]);
            }
            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="absences.csv"');

        return $response;
    }
    public function objection(Request $request)
    {
        $request->validate([
            'presence_id' => 'required|exists:presences,id',
            'objection_description' => 'required|string|max:1000',
        ]);

        $presence = Presence::findOrFail($request->input('presence_id'));
        $presence->objection = $request->input('objection_description');
        $presence->save();

        return redirect()->route('presence.index')->with('success', 'Your objection has been submitted.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            // Accept HH:mm or HH:mm:ss
            'time' => ['required', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],
            'option' => 'required|string',
            'description' => 'nullable|string',
            'objection' => 'nullable|string',
        ]);

        $presence = Presence::findOrFail($id);

        // Convert time to HH:mm:ss if needed
        $time = $request->input('time');
        if (preg_match('/^\d{2}:\d{2}$/', $time)) {
            $time .= ':00';
        }

        $presence->date = $request->input('date');
        $presence->time = $time;
        $presence->option = $request->input('option');
        $presence->description = $request->input('description');

        $presence->save();

        return redirect()->route('presence.index')->with('success', 'Presence record updated successfully.');
    }

}
