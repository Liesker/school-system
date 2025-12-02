<?php

namespace App\Http\Controllers;

use App\Models\Gids;
use App\Models\Vak;
use Illuminate\Http\Request;

class GidsController extends Controller
{
    public function index()
    {
        $gidsen = Gids::with('vakken')->get();
        return view('leerling3.gids.index', compact('gidsen'));
    }

    public function show(Gids $gids)
    {
        $gids->load('vakken');
        return view('leerling3.gids.detail', compact('gids'));
    }

    public function create()
    {
        $vakken = Vak::all();
        return view('leerling3.gids.create', compact('vakken'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required',
        ]);

        $gids = Gids::create($request->only('naam', 'beschrijving', 'jaar'));

        // Koppelen aan vakken
        $gids->vakken()->sync($request->vak_ids ?? []);

        return redirect()->route('gids.table')->with('success', 'Gids aangemaakt!');
    }

    public function edit(Gids $gids)
    {
        $vakken = Vak::all();
        $selected = $gids->vakken->pluck('id')->toArray();

        return view('leerling3.gids.edit', compact('gids', 'vakken', 'selected'));
    }

    public function update(Request $request, Gids $gids)
    {
        $request->validate([
            'naam' => 'required',
        ]);

        $gids->update($request->only('naam', 'beschrijving', 'jaar'));

        $gids->vakken()->sync($request->vak_ids ?? []);

        return redirect()->route('gids.table')->with('success', 'Gids bijgewerkt!');
    }

    public function destroy(Gids $gids)
    {
        $gids->delete();
        return redirect()->route('gids.table')->with('success', 'Gids verwijderd.');
    }

    public function table()
    {
        $gidsen = Gids::with('vakken')->get();

        return view('leerling3.gids.table', compact('gidsen'));
    }

}
