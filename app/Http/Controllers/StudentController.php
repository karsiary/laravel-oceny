<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $subjects = Subject::with(['grades' => function($query) {
            $query->where('student_id', auth()->id())
                ->with('teacher');
        }])->get();

        return view('student.dashboard', compact('subjects'));
    }
} 