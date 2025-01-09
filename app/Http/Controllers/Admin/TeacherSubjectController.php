<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;

class TeacherSubjectController extends Controller
{
    public function edit(User $teacher)
    {
        $subjects = Subject::all();
        return view('admin.teachers.subjects', compact('teacher', 'subjects'));
    }

    public function update(Request $request, User $teacher)
    {
        $teacher->subjects()->sync($request->input('subjects', []));
        return redirect()->route('admin.dashboard')->with('success', 'Przedmioty zostały zaktualizowane.');
    }
} 