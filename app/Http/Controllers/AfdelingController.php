<?php

namespace App\Http\Controllers;

use App\Http\Requests\AfdelingStoreRequest;
use App\Http\Requests\AfdelingUpdateRequest;
use App\Models\Afdeling;

class AfdelingController extends Controller
{
    public function index()
    {
        $afdelingen = Afdeling::all();
        return view('afdeling.index', ['afdelingen' => $afdelingen]);
    }

    public function show($id)
    {
        $afdeling = Afdeling::findOrFail($id);
        return view('afdeling.show', ['afdeling' => $afdeling]);
    }

    public function create()
    {
        return view('afdeling.create');
    }

    public function store(AfdelingStoreRequest $request)
    {
        Afdeling::create($request->validated());
        return redirect()->route('afdeling.index');
    }

    public function edit($id)
    {
        $afdeling = Afdeling::findOrFail($id);
        return view('afdeling.edit', ['afdeling' => $afdeling]);
    }
    
    public function update(AfdelingUpdateRequest $request, $id)
    {
        $afdeling = Afdeling::findOrFail($id);
        $afdeling->update($request->validated());
        return redirect()->route('afdeling.show', ['id' => $id]);
    }

    public function destroy($id)
    {
        Afdeling::destroy($id);
        return redirect()->route('afdeling.index');
    }
}