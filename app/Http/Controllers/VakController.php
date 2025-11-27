<?php

namespace App\Http\Controllers;
use App\Models\Vak;

use Illuminate\Http\Request;

class VakController extends Controller
{
    // INDEX: overzicht van alle vakken
    public function index()
    {
        $vakken = Vak::all();
        return view('leerling3.vak.index', compact('vakken'));
    }

    // DETAIL: detailpagina van een vak
    public function show(Vak $vak)
    {
        return view('leerling3.vak.detail', compact('vak'));
    }

    // TABLE: overzicht voor docenten (beheer)
    public function table()
    {
        $vakken = Vak::all();
        return view('leerling3.vak.table', compact('vakken'));
    }

    // CREATE FORM
    public function create()
    {
        return view('leerling3.vak.create');
    }

    // STORE: opslaan
    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string',
            'beschrijving' => 'nullable|string',
            'afbeelding' => 'nullable|string',
        ]);

        Vak::create($request->all());

        return redirect()->route('vak.table')->with('success', 'Vak succesvol aangemaakt!');
    }

    // EDIT FORM
    public function edit(Vak $vak)
    {
        return view('leerling3.vak.edit', compact('vak'));
    }

    // UPDATE
    public function update(Request $request, Vak $vak)
    {
        $request->validate([
            'naam' => 'required|string',
            'beschrijving' => 'nullable|string',
            'afbeelding' => 'nullable|string',
        ]);

        $vak->update($request->all());

        return redirect()->route('vak.table')->with('success', 'Vak succesvol bijgewerkt!');
    }

    // DELETE
    public function destroy(Vak $vak)
    {
        $vak->delete();
        return redirect()->route('vak.table')->with('success', 'Vak verwijderd!');
    }
}
