<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherSubjectController extends Controller
{
    public function edit(User $teacher)
    {
        // Sprawdź czy użytkownik jest nauczycielem
        if ($teacher->role_id !== 2) {
            return redirect()->route('admin.dashboard')
                ->with('error', 'Ten użytkownik nie jest nauczycielem.');
        }

        $subjects = Subject::all();
        
        return view('admin.teachers.subjects', compact('teacher', 'subjects'));
    }

    public function update(Request $request, User $teacher)
    {
        // Sprawdź czy użytkownik jest nauczycielem
        if ($teacher->role_id !== 2) {
            return redirect()->route('admin.dashboard')
                ->with('error', 'Ten użytkownik nie jest nauczycielem.');
        }

        // Synchronizuj przedmioty
        $teacher->subjects()->sync($request->input('subjects', []));

        return redirect()->route('admin.dashboard')
            ->with('success', 'Przedmioty zostały zaktualizowane.');
    }
} 