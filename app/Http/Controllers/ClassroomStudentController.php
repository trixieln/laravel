<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassroomStudent;
class ClassroomStudentController extends Controller
{
    public function index()
    {
        $classroomStudents = ClassroomStudent::all();
    return view('classroom-students.index', compact('classroomStudents'));
    }

    public function create()
    {
        return view('classroom-students.create');
    }

    public function store(Request $request)
    {
        $classroomStudent = new ClassroomStudent();
        $classroomStudent->fill($request->all());
        $classroomStudent->save();
        return redirect()->route('classroom-students.index');
    }

    public function show(string $id)
    {
        $classroomStudent = ClassroomStudent::find($id);
        return view('classroom-students.show', compact('classroomStudent'));
    }

    public function edit(string $id)
    {
        $classroomStudent = ClassroomStudent::find($id);
        return view('classroom-students.edit', compact('classroomStudent'));
    }

    public function update(Request $request, string $id)
    {
        $classroomStudent = ClassroomStudent::find($id);
        $classroomStudent->fill($request->all());
        $classroomStudent->save();
        return redirect()->route('classroom-students.index');
    }

    public function destroy(string $id)
    {
        $classroomStudent = ClassroomStudent::find($id);
        $classroomStudent->delete();
        return redirect()->route('classroom-students.index');
    }
}
