<?php

namespace App\Http\Controllers;

use App\Models\Cijfer;
use App\Models\User;
use Illuminate\Http\Request;

class CijferController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('firstname')->get();

        // Als er GEEN user geselecteerd is → laat GEEN cijfers zien
        $cijfers = collect();

        if ($request->filled('user_id')) {
            $cijfers = Cijfer::where('user_id', $request->user_id)->get();
        }

        return view('cijfers.index', compact('users', 'cijfers'));
    }

    public function show(Cijfer $cijfer)
    {
        return view('cijfers.show', compact('cijfer'));
    }

    public function edit(Cijfer $cijfer)
    {
        return view('cijfers.edit', compact('cijfer'));
    }

    public function update(Request $request, Cijfer $cijfer)
{
    // waarde ophalen en komma naar punt omzetten
    $waarde = str_replace(',', '.', $request->waarde);

    $request->validate([
        'vak' => 'required|string',
        'waarde' => 'required',
    ]);

    // controleren of de waarde numeriek is NA omzetting
    if (!is_numeric($waarde)) {
            return back()
                ->withErrors(['waarde' => 'Voer een geldig getal in (bijv. 7,5 of 7.5).'])
                ->withInput();
        }

        $cijfer->update([
            'vak'    => $request->vak,
            'waarde' => $waarde,
        ]);

        return redirect()
            ->route('cijfers.show', $cijfer)
            ->with('success', 'Cijfer succesvol aangepast!');
    }

}
