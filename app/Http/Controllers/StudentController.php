<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['course','gender','subjects'])->get();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'email' => 'required|email|unique:students,email',
            'course_id' => 'required|integer|exists:courses,id',
            'skills' => 'nullable|array',
            'skills.*' => 'string',
            'gender_id' => 'required|integer|exists:genders,id',
            'subject_ids' => 'nullable|array',
            'subject_ids.*' => 'integer|exists:subjects,id',
        ]);

        $student = Student::create([
            'name' => $validated['name'],
            'age' => $validated['age'],
            'email' => $validated['email'],
            'course_id' => $validated['course_id'],
            'skills' => $validated['skills'] ?? null,
            'gender_id' => $validated['gender_id'],
        ]);

        if (!empty($validated['subject_ids'])) {
            $student->subjects()->attach($validated['subject_ids']);
        }

        return response()->json(['message'=>'Student created','data'=>$student->load(['course','gender','subjects'])], 201);
    }

    public function show($id)
    {
        $student = Student::with(['course','gender','subjects'])->find($id);
        if (!$student) {
            return response()->json(['message'=>'Student not found'], 404);
        }
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'age' => 'sometimes|integer|min:1',
            'email' => ['sometimes','email', Rule::unique('students','email')->ignore($student->id)],
            'course_id' => 'sometimes|integer|exists:courses,id',
            'skills' => 'nullable|array',
            'skills.*' => 'string',
            'gender_id' => 'sometimes|integer|exists:genders,id',
            'subject_ids' => 'nullable|array',
            'subject_ids.*' => 'integer|exists:subjects,id',
        ]);

        $student->update($validated);

        if (array_key_exists('subject_ids', $validated)) {
            // sync subjects if subject_ids provided (empty array will detach all)
            $student->subjects()->sync($validated['subject_ids']);
        }

        return response()->json(['message'=>'Student updated','data'=>$student->load(['course','gender','subjects'])]);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message'=>'Student not found'], 404);
        }

        $student->subjects()->detach();
        $student->delete();

        return response()->json(['message'=>'Deleted successfully']);
    }

    
}
