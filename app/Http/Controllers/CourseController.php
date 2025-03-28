<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        return response()->json($courses);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            // Add other validation rules as needed
        ]);
    
        $course = Course::create($validatedData);
        return response()->json(['message' => 'Course created successfully', 'course' => $course], 201);
    }

    public function show(string $id)
    {
        $course = Course::find($id);

    if (!$course) {
        return response()->json(['message' => 'Course not found'], 404);
    }

    return response()->json($course);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $course = Course::find($id);

    if (!$course) {
        return response()->json(['message' => 'Course not found'], 404);
    }

    $validatedData = $request->validate([
        'name' => 'sometimes|required|string',
        'description' => 'sometimes|required|string',
        // Add other validation rules as needed
    ]);

    $course->update($validatedData);

    return response()->json(['message' => 'Course updated successfully', 'course' => $course]);
    }

    public function destroy(string $id)
    {
        $course = Course::find($id);

    if (!$course) {
        return response()->json(['message' => 'Course not found'], 404);
    }

    $course->delete();

    return response()->json(['message' => 'Course deleted successfully']);
    }
}
