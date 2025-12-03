<?php

namespace App\Http\Controllers;

use App\Http\Requests\KlasStoreRequest;
use App\Http\Requests\KlasUpdateRequest;
use App\Models\Klas;

class KlasController extends Controller
{
    public function index()
    {
        $klassen = Klas::all();
        return view('klas.index', ['klassen' => $klassen]);
    }

    public function show($id)
    {
        $klas = Klas::findOrFail($id);
        return view('klas.show', ['klas' => $klas]);
    }

    public function create()
    {
        return view('klas.create');
    }

    public function store(KlasStoreRequest $request)
    {
        Klas::create($request->validated());
        return redirect()->route('klas.index');
    }

    public function edit($id)
    {
        $klas = Klas::findOrFail($id);
        return view('klas.edit', ['klas' => $klas]);
    }
    
    public function update(KlasUpdateRequest $request, $id)
    {
        $klas = Klas::findOrFail($id);
        $klas->update($request->validated());
        return redirect()->route('klas.show', ['id' => $id]);
    }

    public function destroy($id)
    {
        Klas::destroy($id);
        return redirect()->route('klas.index');
    }
}