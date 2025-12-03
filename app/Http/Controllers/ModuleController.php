<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Vak;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::with('vak')->get();
        return view('leerling3.module.index', compact('modules'));
    }


    public function show(Module $module)
    {
        $module->load('vak', 'opdrachten');
        return view('leerling3.module.detail', compact('module'));
    }


    public function table()
    {
        $modules = Module::with('vak')->get();
        return view('leerling3.module.table', compact('modules'));
    }
    public function create()
    {
        // Nodig voor dropdown: module hoort bij een vak
        $vakken = Vak::all();
        return view('leerling3.module.create', compact('vakken'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'nullable|string',
            'afbeelding' => 'nullable|string',
            'vak_id' => 'required|exists:vak,id',
        ]);

        Module::create($request->all());

        return redirect()->route('module.table')->with('success', 'Module succesvol aangemaakt!');
    }


    public function edit(Module $module)
    {
        $vakken = Vak::all();
        return view('leerling3.module.edit', compact('module', 'vakken'));
    }


    public function update(Request $request, Module $module)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'nullable|string',
            'afbeelding' => 'nullable|string',
            'vak_id' => 'required|exists:vak,id',
        ]);

        $module->update($request->all());

        return redirect()->route('module.table')->with('success', 'Module succesvol bijgewerkt!');
    }


    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('module.table')->with('success', 'Module verwijderd.');
    }
}
