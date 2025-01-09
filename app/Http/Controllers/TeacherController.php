<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\GradeHistory;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        DB::transaction(function () use ($validated) {
            $grade = Grade::create($validated);
            
            GradeHistory::create([
                'grade_id' => $grade->id,
                'edited_by' => auth()->id(),
                'new_grade' => $validated['grade'],
                'new_comment' => $validated['comment'] ?? null,
            ]);
        });

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

        DB::transaction(function () use ($grade, $validated) {
            GradeHistory::create([
                'grade_id' => $grade->id,
                'edited_by' => auth()->id(),
                'old_grade' => $grade->grade,
                'new_grade' => $validated['grade'],
                'old_comment' => $grade->comment,
                'new_comment' => $validated['comment'] ?? null,
            ]);

            $grade->update($validated);
        });

        return redirect()->route('teacher.dashboard')->with('success', 'Ocena została zaktualizowana.');
    }
} 