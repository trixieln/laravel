<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamResult;
class ExamResultController extends Controller
{
    public function index()
    {
        $examResults = ExamResult::all();
        return view('exam-results.index', compact('examResults'));
    }

    public function create()
    {
        return view('exam-results.create');
    }

    public function store(Request $request)
    {
        $examResult = new ExamResult();
        $examResult->name = $request->input('name');
        $examResult->score = $request->input('score');
        $examResult->save();
        return redirect()->route('exam-results.index');
    }

    public function show(string $id)
    {
        $examResult = ExamResult::find($id);
        return view('exam-results.show', compact('examResult'));
    }

    public function edit(string $id)
    {
        $examResult = ExamResult::find($id);
        return view('exam-results.edit', compact('examResult'));
    }

    public function update(Request $request, string $id)
    {
        $examResult = ExamResult::find($id);
        $examResult->name = $request->input('name');
        $examResult->score = $request->input('score');
        $examResult->save();
        return redirect()->route('exam-results.index');
    }

    public function destroy(string $id)
    {
        $examResult = ExamResult::find($id);
        $examResult->delete();
        return redirect()->route('exam-results.index');
    }
}
