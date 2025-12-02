<?php

namespace App\Http\Controllers;

use App\Models\Opdracht;
use App\Models\Module;
use Illuminate\Http\Request;

class OpdrachtController extends Controller
{
    public function index()
    {
        $opdrachten = Opdracht::with('module')->get();
        return view('leerling3.opdracht.index', compact('opdrachten'));
    }

    public function table()
    {
        $opdrachten = Opdracht::with('module')->get();
        return view('leerling3.opdracht.table', compact('opdrachten'));
    }

    public function create()
    {
        $modules = Module::all();
        return view('leerling3.opdracht.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'nullable|string',
            'uitleg' => 'nullable|string',
            'module_id' => 'required|exists:module,id',
        ]);

        Opdracht::create($request->all());
        return redirect()->route('opdracht.table')->with('success', 'Opdracht aangemaakt!');
    }

    public function show(Opdracht $opdracht)
    {
        $opdracht->load('module');
        return view('leerling3.opdracht.detail', compact('opdracht'));
    }

    public function edit(Opdracht $opdracht)
    {
        $modules = Module::all();
        return view('leerling3.opdracht.edit', compact('opdracht', 'modules'));
    }

    public function update(Request $request, Opdracht $opdracht)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'nullable|string',
            'uitleg' => 'nullable|string',
            'module_id' => 'required|exists:module,id',
        ]);

        $opdracht->update($request->all());
        return redirect()->route('opdracht.table')->with('success', 'Opdracht bijgewerkt!');
    }

    public function destroy(Opdracht $opdracht)
    {
        $opdracht->delete();
        return redirect()->route('opdracht.table')->with('success', 'Opdracht verwijderd!');
    }
}
