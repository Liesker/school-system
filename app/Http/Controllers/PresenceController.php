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
}
