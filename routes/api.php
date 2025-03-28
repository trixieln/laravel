<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ClassroomStudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\ExamTypeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

// General API Test Route
Route::get('/', function () {
    return response()->json(['message' => 'API working']);
});

// Authenticated User and Resource Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Classroom Management
    Route::apiResource('classrooms', ClassroomController::class);
    Route::apiResource('classroom-students', ClassroomStudentController::class);

    // Course and Exams
    Route::apiResource('courses', CourseController::class);
    Route::apiResource('exams', ExamController::class);
    Route::apiResource('exam-results', ExamResultController::class);
    Route::apiResource('exam-types', ExamTypeController::class);

    // Student and Teacher Management
    Route::apiResource('students', StudentController::class);
    Route::apiResource('teachers', TeacherController::class);
    Route::apiResource('parents', ParentController::class);

    // Attendance and Grades
    Route::apiResource('attendance', AttendanceController::class);
    Route::apiResource('grades', GradeController::class);
});
