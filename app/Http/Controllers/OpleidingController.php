<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpleidingStoreRequest;
use App\Http\Requests\OpleidingUpdateRequest;
use App\Models\Opleiding;

class OpleidingController extends Controller
{
    public function index()
    {
        $opleidingen = Opleiding::all();
        return view('opleiding.index', ['opleidingen' => $opleidingen]);
    }

    public function show($id)
    {
        $opleiding = Opleiding::findOrFail($id);
        return view('opleiding.show', ['opleiding' => $opleiding]);
    }

    public function create()
    {
        return view('opleiding.create');
    }

    public function store(OpleidingStoreRequest $request)
    {
        Opleiding::create($request->validated());
        return redirect()->route('opleiding.index');
    }

    public function edit($id)
    {
        $opleiding = Opleiding::findOrFail($id);
        return view('opleiding.edit', ['opleiding' => $opleiding]);
    }

    public function update(OpleidingUpdateRequest $request, $id)
    {
        $opleiding = Opleiding::findOrFail($id);
        $opleiding->update($request->validated());
        return redirect()->route('opleiding.show', ['id' => $id]);
    }
    
    public function destroy($id)
    {
        Opleiding::destroy($id);
        return redirect()->route('opleiding.index');
    }
}