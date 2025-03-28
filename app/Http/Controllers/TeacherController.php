<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers',
        ]);
    
        $teacher = new Teacher();
        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');
        $teacher->save();
    
        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }

    public function show(string $id)
    {
        $teacher = Teacher::find($id);
        return view('teachers.show', compact('teacher'));
    }

    public function edit(string $id)
    {
        $teacher = Teacher::find($id);
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers,email,' . $id,
        ]);
    
        $teacher = Teacher::find($id);
        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');
        $teacher->save();
    
        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy(string $id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
