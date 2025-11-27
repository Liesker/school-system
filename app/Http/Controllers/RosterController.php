<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RosterController extends Controller
{
    public function index()
    {
        $rosters = \App\Models\Roster::all();
        return view('rosters.index', compact('rosters'));
    }

    public function show($id)
    {
        // Logic to show a specific roster
    }

    public function create()
    {
        // Logic to show form to create a new roster
    }

    public function store(Request $request)
    {
        // Logic to store a new roster
    }

    public function edit($id)
    {
        // Logic to show form to edit an existing roster
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing roster
    }

    public function delete($id)
    {
        // Logic to delete a roster
    }
}
