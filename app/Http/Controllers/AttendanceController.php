<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();
        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        return view('attendance.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);
    
        Attendance::create($request->all());
        return redirect()->route('attendance.index')->with('success', 'Attendance created successfully.');
    }

    public function show(string $id)
    {
        $attendance = Attendance::find($id);
        return view('attendance.show', compact('attendance'));
    }

    public function edit(string $id)
    {
        $attendance = Attendance::find($id);
        return view('attendance.edit', compact('attendance'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'student_id' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);
    
        $attendance = Attendance::find($id);
        $attendance->update($request->all());
        return redirect()->route('attendance.index')->with('success', 'Attendance updated successfully.');
    }

    public function destroy(string $id)
    {
        $attendance = Attendance::find($id);
        $attendance->delete();
        return redirect()->route('attendance.index')->with('success', 'Attendance deleted successfully.');
    }
}
