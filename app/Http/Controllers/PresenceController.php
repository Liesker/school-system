<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presence;

class PresenceController extends Controller
{
    public function index(Request $request)
    {
        $presences = Presence::select('id', 'date', 'time', 'option', 'description', 'created_at', 'updated_at')
            ->orderBy('date', 'desc')
            ->orderBy('time', 'desc')
            ->get();

        return response()->json($presences);
    }
}
