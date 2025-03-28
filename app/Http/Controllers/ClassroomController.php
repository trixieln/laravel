<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        return view('classrooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    
        $classroom = new Classroom();
        $classroom->name = $request->input('name');
        $classroom->description = $request->input('description');
        $classroom->save();
    
        return redirect()->route('classrooms.index')->with('success', 'Classroom created successfully.');
    }

    public function show(string $id)
    {
        $classroom = Classroom::find($id);
        return view('classrooms.show', compact('classroom'));
    }

    public function edit(string $id)
    {
        $classroom = Classroom::find($id);
        return view('classrooms.edit', compact('classroom'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    
        $classroom = Classroom::find($id);
        $classroom->name = $request->input('name');
        $classroom->description = $request->input('description');
        $classroom->save();
    
        return redirect()->route('classrooms.index')->with('success', 'Classroom updated successfully.');
    }

    public function destroy(string $id)
    {
        $classroom = Classroom::find($id);
    $classroom->delete();

    return redirect()->route('classrooms.index')->with('success', 'Classroom deleted successfully.');
    }
}
