<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objection;

class ObjectionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'presence_id' => 'required|exists:presences,id',
            'description' => 'required|string|max:1000',
        ]);

        Objection::create([
            'presence_id' => $request->input('presence_id'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('presence.index')->with('success', 'Your objection has been submitted.');
    }
}
