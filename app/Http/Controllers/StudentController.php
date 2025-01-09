<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $subjects = Subject::with(['grades' => function($query) {
            $query->where('student_id', auth()->id())
                ->with(['teacher', 'history.editor']);
        }])->get();

        return view('student.dashboard', compact('subjects'));
    }

    public function showGradeHistory(Grade $grade)
    {
        if ($grade->student_id !== auth()->id()) {
            abort(403);
        }

        return view('student.grades.history', compact('grade'));
    }
} 