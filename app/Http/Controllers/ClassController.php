<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classroom::all();
        return view('classes.index', compact('classes'));
    }
    public function show($id)
    {
        $class = Classroom::findOrFail($id);
        return view('classes.show', compact('class'));
    }
    public function edit($id)
    {
        $class = Classroom::findOrFail($id);
        return view('classes.edit', compact('class'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
        ]);

        $class = Classroom::findOrFail($id);
        $class->name = $data['name'];
        $class->description = $data['description'] ?? null;
        $class->capacity = $data['capacity'];
        $class->save();

        return redirect()->route('classrooms.show', ['id' => $class->id])->with('success', 'Class updated successfully.');
    }
    public function delete($id)
    {
        $class = Classroom::findOrFail($id);
        $class->delete();
        return redirect()->route('classrooms')->with('success', 'Class deleted successfully.');
    }
}
