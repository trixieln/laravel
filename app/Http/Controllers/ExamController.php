<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        return view('exams.index', compact('exams'));
    }

    public function create()
    {
        return view('exams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    
        Exam::create($request->all());
        return redirect()->route('exams.index')->with('success', 'Exam created successfully.');
    }

    public function show(string $id)
    {
        $exam = Exam::find($id);
        return view('exams.show', compact('exam'));
    }

    public function edit(string $id)
    {
        $exam = Exam::find($id);
        return view('exams.edit', compact('exam'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    
        $exam = Exam::find($id);
        $exam->update($request->all());
        return redirect()->route('exams.index')->with('success', 'Exam updated successfully.');
    }

    public function destroy(string $id)
    {
        Exam::destroy($id);
        return redirect()->route('exams.index')->with('success', 'Exam deleted successfully.');
    }
}
