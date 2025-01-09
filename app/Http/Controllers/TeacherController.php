<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $students = User::whereHas('role', function($query) {
            $query->where('slug', 'student');
        })->get();
        
        $subjects = Subject::all();
        
        return view('teacher.dashboard', compact('students', 'subjects'));
    }

    public function addGrade(Request $request)
    {
        $validated = $request->validate([
            'student_id' => ['required', 'exists:users,id'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'grade' => ['required', 'integer', 'between:1,6'],
            'comment' => ['nullable', 'string', 'max:255'],
        ]);

        $validated['teacher_id'] = auth()->id();

        Grade::create($validated);

        return redirect()->route('teacher.dashboard')->with('success', 'Ocena została dodana.');
    }

    public function editGrade(Grade $grade)
    {
        return view('teacher.grades.edit', compact('grade'));
    }

    public function updateGrade(Request $request, Grade $grade)
    {
        $validated = $request->validate([
            'grade' => ['required', 'integer', 'between:1,6'],
            'comment' => ['nullable', 'string', 'max:255'],
        ]);

        $grade->update($validated);

        return redirect()->route('teacher.dashboard')->with('success', 'Ocena została zaktualizowana.');
    }
} 