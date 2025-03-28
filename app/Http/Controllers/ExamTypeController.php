<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamType;
class ExamTypeController extends Controller
{
    public function index()
    {
        $examTypes = ExamType::all();
        return view('exam-types.index', compact('examTypes'));
    }

    public function create()
    {
        return view('exam-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
    
        ExamType::create($request->all());
    
        return redirect()->route('exam-types.index')
            ->with('success', 'Exam type created successfully.');
    }

    public function show(string $id)
    {
        $examType = ExamType::find($id);
        return view('exam-types.show', compact('examType'));
    }

    public function edit(string $id)
    {
        $examType = ExamType::find($id);
        return view('exam-types.edit', compact('examType'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
    
        $examType = ExamType::find($id);
        $examType->update($request->all());
    
        return redirect()->route('exam-types.index')
            ->with('success', 'Exam type updated successfully.');
    }

    public function destroy(string $id)
    {
        ExamType::destroy($id);

    return redirect()->route('exam-types.index')
        ->with('success', 'Exam type deleted successfully.');
    }
}
