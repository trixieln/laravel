<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        return view('grades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    
        Grade::create($request->all());
    
        return redirect()->route('grades.index')
            ->with('success', 'Grade created successfully.');
    }

    public function show(string $id)
    {
        $grade = Grade::find($id);
        return view('grades.show', compact('grade'));
    }

    public function edit(string $id)
    {
        $grade = Grade::find($id);
        return view('grades.edit', compact('grade'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    
        $grade = Grade::find($id);
        $grade->update($request->all());
    
        return redirect()->route('grades.index')
            ->with('success', 'Grade updated successfully.');
    }

    public function destroy(string $id)
    {
        $grade = Grade::find($id);
        $grade->delete();

        return redirect()->route('grades.index')
            ->with('success', 'Grade deleted successfully.');
    }
}
